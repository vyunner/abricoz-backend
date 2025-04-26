<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PosUploadProductPhotoController extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request->allFiles());

        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // 1. Сжимаем фото
        $original = $request->file('photo');
        $image = Image::make($original)
            ->orientate()
            ->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('webp', 35); // Качество около 20-25 КБ

        // 2. Генерация пути
        $filename = 'products/' . Str::uuid() . '.webp';

        // 3. Загрузка в S3
        Storage::disk('s3')->put($filename, (string) $image, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        // 4. Отправка запроса в ChatGPT API напрямую
        $openaiApiKey = env('OPENAI_API_KEY');

        $response = Http::withToken($openaiApiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Проанализируй фото товара. Напиши: 1) Название на русском, 2) Название на английском, 3) Описание на русском в 3 предложениях, 4) Описание на казахском в 3 предложениях.',
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => $photoUrl,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Ошибка при запросе к OpenAI'], 500);
        }

        $gptAnswer = $response->json('choices.0.message.content') ?? '';

        // 5. Возвращаем ответ
        return response()->json([
            'photo_url' => $photoUrl,
            'gpt_text' => $gptAnswer,
        ]);
    }
}

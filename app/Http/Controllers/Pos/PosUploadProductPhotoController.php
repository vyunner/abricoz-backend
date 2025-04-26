<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;

class PosUploadProductPhotoController extends Controller
{
    public function __invoke(Request $request)
    {
        Log::info('Файлы, пришедшие с фронта:', $request->allFiles());

        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $original = $request->file('photo');

        // Новый способ работы в Intervention 3
        $manager = new ImageManager(new Driver());
        $image = $manager->read($original)
            ->cover(500, 500)        // обрезает и вписывает в 500x500 сохраняя пропорции
            ->toWebp(quality: 95);    // сохраняет в webp с качеством

        $filename = 'products/' . Str::uuid() . '.webp';

        Storage::disk('s3')->put($filename, (string) $image, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

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

        return response()->json([
            'photo_url' => $photoUrl,
            'gpt_text' => $gptAnswer,
        ]);
    }
}

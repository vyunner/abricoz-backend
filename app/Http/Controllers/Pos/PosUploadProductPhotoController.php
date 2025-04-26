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

        // Получаем оригинальное фото
        $original = $request->file('photo');

        // Кодируем оригинальное фото в base64
        $base64Image = base64_encode(file_get_contents($original->getRealPath()));

        // Новый способ работы в Intervention 3 (для сжатия и сохранения)
        $manager = new ImageManager(new Driver());
        $image = $manager->read($original)
            ->cover(500, 500)
            ->toWebp(quality: 95);

        // Генерация пути для сжатого фото
        $filename = 'products/' . Str::uuid() . '.webp';

        // Загрузка сжатого изображения в S3
        Storage::disk('s3')->put($filename, (string) $image, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        $openaiApiKey = env('OPENAI_API_KEY');

        // Отправка запроса в OpenAI API c base64-изображением
        $response = Http::withToken($openaiApiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => 'Проанализируй изображение товара. Если информация недостаточно ясная, пожалуйста, сделай логичное предположение и всё равно составь:
1) Название товара на русском языке
2) Название товара на английском языке
3) Описание товара на русском языке (3 предложения)
4) Описание товара на казахском языке (3 предложения)
Даже если изображение не полностью понятно — необходимо всё равно придумать текст на основе наиболее вероятного предположения.'
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/jpeg;base64,' . $base64Image,
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

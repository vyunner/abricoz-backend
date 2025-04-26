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

        $manager = new ImageManager(new Driver());

        // 1. Готовим изображение для ChatGPT (1000px ширина, качество 95)
        $imageForGpt = $manager->read($original)
            ->resize(1000, null)
            ->toWebp(quality: 95);

        $base64Image = base64_encode((string) $imageForGpt);

        // 2. Готовим изображение для хранения в S3 (500px ширина, качество 95)
        $imageForS3 = $manager->read($original)
            ->resize(1000, null)
            ->toWebp(quality: 95);

        $filename = 'products/' . Str::uuid() . '.webp';

        Storage::disk('s3')->put($filename, (string) $imageForS3, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        $openaiApiKey = env('OPENAI_API_KEY');

        // Отправка base64-картинки в OpenAI
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
                                    'url' => 'data:image/webp;base64,' . $base64Image,
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

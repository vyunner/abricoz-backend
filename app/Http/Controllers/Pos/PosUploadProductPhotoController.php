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
        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $original = $request->file('photo');
        $manager = new ImageManager(new Driver());

        // 1. GPT: 1000px ширина, качество 95
        $imageForGpt = $manager->read($original)
            ->resize(1000, 1000)
            ->toWebp(quality: 95);

        $base64Image = base64_encode((string) $imageForGpt);

        // 2. S3: 500x500
        $imageForS3 = $manager->read($original)
            ->resize(500, 500)
            ->toWebp(quality: 95);

        $filename = 'products/' . Str::uuid() . '.webp';
        Storage::disk('s3')->put($filename, (string) $imageForS3, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        $openaiApiKey = env('OPENAI_API_KEY');

        $prompt = <<<PROMPT
Проанализируй изображение товара. Если информация недостаточно ясная, пожалуйста, сделай логичное предположение и всё равно придумай:
1. "name_ru" — название товара на русском языке (1 строка)
2. "name_kz" — название товара на казахском языке (1 строка)
3. "description_ru" — описание товара на русском языке (3 предложения)
4. "description_kz" — описание товара на казахском языке (3 предложения)

Ответ верни строго в формате JSON с этими полями.
PROMPT;

        $response = Http::withToken($openaiApiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            ['type' => 'text', 'text' => $prompt],
                            ['type' => 'image_url', 'image_url' => ['url' => 'data:image/webp;base64,' . $base64Image]],
                        ],
                    ],
                ],
            ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Ошибка при запросе к OpenAI'], 500);
        }

        $text = $response->json('choices.0.message.content');

        // Пробуем распарсить JSON
        $json = json_decode($text, true);

        if (!is_array($json) || !isset($json['name_ru'])) {
            return response()->json([
                'photo_url' => $photoUrl,
                'raw_gpt_response' => $text,
                'error' => 'Ответ GPT не распознан как JSON.',
            ], 422);
        }

        return response()->json(array_merge(['photo_url' => $photoUrl], $json));
    }
}

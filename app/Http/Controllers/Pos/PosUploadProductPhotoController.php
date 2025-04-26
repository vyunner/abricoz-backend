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

        // 1. Готовим изображение для GPT (1500x1500, качество 97)
        $imageForGpt = $manager->read($original)
            ->resize(1500, 1500)
            ->toWebp(quality: 97);

        $base64Image = base64_encode((string) $imageForGpt);

        // 2. Готовим изображение для S3 (500x500)
        $imageForS3 = $manager->read($original)
            ->resize(500, 500)
            ->toWebp(quality: 95);

        $filename = 'products/' . Str::uuid() . '.webp';
        Storage::disk('s3')->put($filename, (string) $imageForS3, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        $openaiApiKey = config('services.openai.api_key');

        $prompt = <<<PROMPT
Проанализируй изображение упаковки товара и верни строго JSON-объект без Markdown, без пояснений, без лишнего текста.

Формат:
{
  "name_ru": "Коммерческое название товара на русском языке — укажи тип товара, бренд, вкус (например: Пирожное Lotte Chocolate Pie какао)",
  "name_kz": "Коммерческое название товара на казахском языке — укажи тип товара, бренд, вкус (например: Пирожное Lotte Chocolate Pie какао)",
  "description_ru": "Описание товара на русском языке — 3 средних предложения для интернет-магазина",
  "description_kz": "Описание товара на казахском языке — 3 средних предложения для интернет-магазина"
}
Верни только JSON-объект.
PROMPT;

        $response = Http::withToken($openaiApiKey)
            ->asJson()
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => $prompt,
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/webp;base64,' . $base64Image,
                                    'detail' => 'auto',
                                ],
                            ],
                        ],
                    ],
                ],
            ]);


        if ($response->failed()) {
            Log::error('Ошибка OpenAI', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return response()->json([
                'error' => 'Ошибка при запросе к OpenAI',
                'details' => $response->json(),
            ], 500);
        }

        $text = $response->json('choices.0.message.content');

        $text = trim($text);
        $text = preg_replace('/^```json|```$/i', '', $text);
        $text = trim($text);

        $json = json_decode($text, true);

        if (!is_array($json) || !isset($json['name_ru'])) {
            Log::warning('Ошибка парсинга GPT ответа', ['raw' => $text]);
            return response()->json([
                'photo_url' => $photoUrl,
                'raw_gpt_response' => $text,
                'error' => 'Ответ GPT не распознан как JSON.',
            ], 422);
        }

        return response()->json(array_merge(['photo_url' => $photoUrl], $json));
    }
}

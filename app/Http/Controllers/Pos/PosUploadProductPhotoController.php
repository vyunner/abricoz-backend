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

        // 1. Готовим изображение для GPT (1000px ширина, качество 95)
        $imageForGpt = $manager->read($original)
            ->resize(1500, 1500)
            ->toWebp(quality: 100);

        $base64Image = base64_encode((string) $imageForGpt);

        // 2. Готовим изображение для S3 (500x500)
        $imageForS3 = $manager->read($original)
            ->resize(500, 500)
            ->toWebp(quality: 95);

        $filename = 'products/' . Str::uuid() . '.webp';
        Storage::disk('s3')->put($filename, (string) $imageForS3, 'public');
        $photoUrl = Storage::disk('s3')->url($filename);

        $openaiApiKey = env('OPENAI_API_KEY');

        // ✍️ Чёткий prompt с инструкцией и без Markdown
        $prompt = <<<PROMPT
Проанализируй изображение товара и верни строго JSON-объект без дополнительных символов, пояснений или Markdown.
Формат JSON:
{
  "name_ru": "название на русском",
  "name_kz": "атауы қазақша",
  "description_ru": "описание на русском в 3 предложениях",
  "description_kz": "сипаттама қазақша 3 сөйлеммен"
}
Если не уверен, придумай максимально логично. Верни только JSON — без обёрток, markdown и пояснений.
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

        // Удалим возможные Markdown обёртки
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

<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MobileBanner;
use Illuminate\Support\Facades\Storage;

/**
 * @group MobileBanner
 */
class MobileBannerStoreController extends Controller
{
    /**
     * Создание нового баннера
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'image' => 'required|image|max:10000',
            'title_ru' => 'nullable|string|max:10000',
            'title_kz' => 'nullable|string|max:10000',
        ]);

        // Загружаем изображение в S3
        if ($request->hasFile('image')) {
            $path = Storage::disk('s3')->put('mobile_banners', $request->file('image'), 'public');
            $validated['image_url'] = Storage::disk('s3')->url($path);
        }

        // Определяем номер нового баннера
        $lastBanner = MobileBanner::orderBy('number', 'desc')->first();
        $validated['number'] = $lastBanner ? $lastBanner->number + 1 : 1;

        // Сохраняем новый баннер
        $banner = MobileBanner::create($validated);

        return response()->json([
            'message' => 'Баннер успешно добавлен!',
            'data' => $banner
        ], 201);
    }
}

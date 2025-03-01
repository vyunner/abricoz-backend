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
            'image' => 'required|image|max:20000',
            'title_ru' => 'nullable|string|max:10000',
            'title_kz' => 'nullable|string|max:10000',
        ]);

        // Загружаем изображение в `public/storage/mobile_banners/`
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mobile_banners', 'public');
            $validated['image_url'] = Storage::url($path); // Генерация URL для доступа
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

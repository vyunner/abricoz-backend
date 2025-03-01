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
        dd('Before validation', $request->all()); // Должен показать входные данные

        $validated = $request->validate([
            'image' => 'required|image|max:10000',
            'title_ru' => 'nullable|string|max:10000',
            'title_kz' => 'nullable|string|max:10000',
        ]);

        dd('After validation', $validated); // Должен показать данные после валидации
    }

}

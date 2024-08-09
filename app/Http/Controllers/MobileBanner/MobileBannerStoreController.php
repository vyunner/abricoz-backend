<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileBanner\MobileBannerStoreRequest;
use App\Models\MobileBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group MobileBanner
 */
class MobileBannerStoreController extends Controller
{
    /**
     * Создание
     * @param MobileBannerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MobileBannerStoreRequest $request)
    {
        $validatedData = $request->validated();

        $paths = [];
        foreach (['ru', 'kz', 'en'] as $locale) {
            $paths[$locale] = $request->file("image_{$locale}")->store('public/mobile-banners');
        }

        $lastBanner = MobileBanner::orderBy('number', 'desc')->first();

        $banner = new MobileBanner();
        foreach (['ru', 'kz', 'en'] as $locale) {
            $banner->{"image_url_{$locale}"} = Storage::url($paths[$locale]);
        }
        $banner->number = $lastBanner ? $lastBanner->number + 1 : 1;
        $banner->save();

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

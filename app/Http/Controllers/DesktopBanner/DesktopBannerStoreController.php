<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\DesktopBannerStoreRequest;
use App\Models\DesktopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group DesktopBanner
 */
class DesktopBannerStoreController extends Controller
{
    /**
     * Создание
     * @param DesktopBannerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DesktopBannerStoreRequest $request)
    {
        $validatedData = $request->validated();

        $paths = [];
        foreach (['ru', 'kz', 'en'] as $locale) {
            $paths[$locale] = $request->file("{$locale}_image")->store('public/desktop-banners');
        }

        $lastBanner = DesktopBanner::orderBy('number', 'desc')->first();

        $banner = new DesktopBanner();
        foreach (['ru', 'kz', 'en'] as $locale) {
            $banner->{"{$locale}_image_url"} = Storage::url($paths[$locale]);
        }
        $banner->number = $lastBanner ? $lastBanner->number + 1 : 1;
        $banner->save();

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

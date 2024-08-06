<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\DesktopBannerStoreRequest;
use App\Models\DekstopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group DekstopBanner
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

        $path = $request->file('image')->store('public/desktop-banners');

        $lastBanner = DekstopBanner::orderBy('number', 'desc')->first();

        $banner = new DekstopBanner();
        $banner->image_url = Storage::url($path);

        $banner->number = $lastBanner ? $lastBanner->number + 1 : 1;
        $banner->save();

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

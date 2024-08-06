<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\MobileBannerStoreRequest;
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

        $path = $request->file('image')->store('public/mobile-banners');

        $lastBanner = MobileBanner::orderBy('number', 'desc')->first();

        $banner = new MobileBanner();
        $banner->image_url = Storage::url($path);

        $banner->number = $lastBanner ? $lastBanner->number + 1 : 1;
        $banner->save();

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

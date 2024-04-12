<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\BannerStoreRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Banner
 */
class BannerStoreController extends Controller
{
    /**
     * Создание
     * @param BannerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BannerStoreRequest $request)
    {
        $validatedData = $request->validated();

        $path = $request->file('image')->store('public/banners');

        $lastBanner = Banner::orderBy('number', 'desc')->first();

        $banner = new Banner();
        $banner->image_url = Storage::url($path);

        $banner->number = $lastBanner ? $lastBanner->number + 1 : 1;
        $banner->save();

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

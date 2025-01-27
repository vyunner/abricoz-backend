<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\DesktopBannerStoreRequest;
use App\Models\DesktopBanner;
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
        $data = $request->validated();

        $last_banner = DesktopBanner::orderBy('number', 'desc')->first();

        $data['number'] = $last_banner?->number + 1 ?? 1;

        foreach (['ru', 'kz', 'en'] as $locale) {
            $path = Storage::disk('s3')->put('desktopbanners', $request->file("{$locale}_image"), 'public');
            $data["image_url_{$locale}"] = Storage::disk('s3')->url($path);
            unset($data["{$locale}_image"]);
        };

        $banner = DesktopBanner::create($data);

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

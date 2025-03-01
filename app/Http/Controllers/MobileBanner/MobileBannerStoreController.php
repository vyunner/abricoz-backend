<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileBanner\MobileBannerStoreRequest;
use App\Models\MobileBanner;
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
        $data = $request->validated();

        $last_banner = MobileBanner::orderBy('number', 'desc')->first();
        $data['number'] = $last_banner?->number + 1 ?? 1;

        if ($request->hasFile('image')) {
            $path = Storage::disk('s3')->put('mobile_banners', $request->file('image'), 'public');
            $data['image_url'] = Storage::disk('s3')->url($path);
            unset($data['image']);
        }

        $banner = MobileBanner::create($data);

        return $this->response($banner, 'Баннер успешно добавлен!');
    }
}

<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

/**
 * @group Banner
 */
class BannerUpdateController extends Controller
{
    /**
     * Обновление
     * @param BannerUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BannerUpdateRequest $request)
    {
        $validatedData = $request->validated();

        foreach ($validatedData['banners'] as $bannerData) {
            $banner = Banner::find($bannerData['id']);
            $banner->order = $bannerData['order'];
            $banner->save();
        }

        $banners = Banner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Порядок баннеров успешно изменен!');
    }
}

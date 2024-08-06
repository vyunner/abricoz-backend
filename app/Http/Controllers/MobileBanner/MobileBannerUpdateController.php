<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileBanner\MobileBannerUpdateRequest;
use App\Models\MobileBanner;
use Illuminate\Http\Request;

/**
 * @group MobileBanner
 */
class MobileBannerUpdateController extends Controller
{
    /**
     * Обновление
     * @param MobileBannerUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MobileBannerUpdateRequest $request)
    {
        $validatedData = $request->validated();

        foreach ($validatedData['banners'] as $bannerData) {
            $banner = MobileBanner::find($bannerData['id']);
            $banner->number = $bannerData['number'];
            $banner->save();
        }

        $banners = MobileBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Порядок баннеров успешно изменен!');
    }
}

<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\DesktopBannerUpdateRequest;
use App\Models\DekstopBanner;
use Illuminate\Http\Request;

/**
 * @group DekstopBanner
 */
class DesktopBannerUpdateController extends Controller
{
    /**
     * Изменение порядка баннеров
     * @param DesktopBannerUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DesktopBannerUpdateRequest $request)
    {
        $validatedData = $request->validated();

        foreach ($validatedData['banners'] as $bannerData) {
            $banner = DekstopBanner::find($bannerData['id']);
            $banner->number = $bannerData['number'];
            $banner->save();
        }

        $banners = DekstopBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Порядок баннеров успешно изменен!');
    }
}

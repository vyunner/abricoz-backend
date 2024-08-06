<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesktopBanner\DesktopBannerUpdateRequest;
use App\Models\DesktopBanner;
use Illuminate\Http\Request;

/**
 * @group DesktopBanner
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
            $banner = DesktopBanner::find($bannerData['id']);
            $banner->number = $bannerData['number'];
            $banner->save();
        }

        $banners = DesktopBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Порядок баннеров успешно изменен!');
    }
}

<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Models\DesktopBanner;

/**
 * @group DesktopBanner
 */
class DesktopBannerIndexController extends Controller
{
    /**
     * Список
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $banners = DesktopBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

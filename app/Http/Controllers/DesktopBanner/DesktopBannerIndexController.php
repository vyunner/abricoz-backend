<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Models\DesktopBanner;
use Illuminate\Http\Request;

/**
 * @group DesktopBanner
 */
class DesktopBannerIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $banners = DesktopBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

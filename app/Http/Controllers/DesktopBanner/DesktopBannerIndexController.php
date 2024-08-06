<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Models\DekstopBanner;
use Illuminate\Http\Request;

/**
 * @group DekstopBanner
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
        $banners = DekstopBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

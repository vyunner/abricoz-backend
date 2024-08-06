<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Models\MobileBanner;
use Illuminate\Http\Request;

/**
 * @group MobileBanner
 */
class MobileBannerIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $banners = MobileBanner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

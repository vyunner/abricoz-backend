<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

/**
 * @group Banner
 */
class BannerIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $banners = Banner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

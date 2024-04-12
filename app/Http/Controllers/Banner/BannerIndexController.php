<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $banners = Banner::orderBy('number', 'asc')->get();

        return $this->response($banners, 'Баннеры успешно загружены!');
    }
}

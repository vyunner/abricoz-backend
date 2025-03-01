<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Http\Requests\MobileBanner\MobileBannerStoreRequest;
use App\Models\MobileBanner;
use Illuminate\Support\Facades\Storage;

/**
 * @group MobileBanner
 */
class MobileBannerStoreController extends Controller
{
    /**
     * Создание
     * @param MobileBannerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(MobileBannerStoreRequest $request)
    {
        dd('Controller reached!');
    }
}

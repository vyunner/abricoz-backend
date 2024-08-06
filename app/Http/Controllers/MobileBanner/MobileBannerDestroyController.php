<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Models\MobileBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group MobileBanner
 */
class MobileBannerDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $banner = MobileBanner::findOrFail($id);

        $filePath = 'public' . str_replace('/storage', '', $banner->image_url);

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

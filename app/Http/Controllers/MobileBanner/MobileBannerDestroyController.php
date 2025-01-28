<?php

namespace App\Http\Controllers\MobileBanner;

use App\Http\Controllers\Controller;
use App\Models\MobileBanner;
use Illuminate\Support\Facades\Storage;

/**
 * @group MobileBanner
 */
class MobileBannerDestroyController extends Controller
{
    /**
     * Удаление
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $banner = MobileBanner::findOrFail($id);

        if ($banner->image_url && Storage::disk('s3')->exists($banner->image_path)) {
            Storage::disk('s3')->delete($banner->image_path);
        }

        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

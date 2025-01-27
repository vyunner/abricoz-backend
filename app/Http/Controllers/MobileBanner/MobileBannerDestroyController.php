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

        foreach (['ru_image_url', 'kz_image_url', 'en_image_url'] as $locale) {
            if (Storage::disk('s3')->exists($banner->$locale)) {
                Storage::disk('s3')->delete($banner->$locale);
            }
        }

        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

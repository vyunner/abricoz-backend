<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Models\DesktopBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group DesktopBanner
 */
class DesktopBannerDestroyController extends Controller
{
    /**
     * Удаление
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $banner = DesktopBanner::findOrFail($id);

        foreach (['ru_image_url', 'kz_image_url', 'en_image_url'] as $locale) {
            if ($banner->$locale && Storage::disk('s3')->exists($banner->$locale)) {
                Storage::disk('s3')->delete($banner->$locale);
            }
        }

        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

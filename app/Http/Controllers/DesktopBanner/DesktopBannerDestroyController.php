<?php

namespace App\Http\Controllers\DesktopBanner;

use App\Http\Controllers\Controller;
use App\Models\DesktopBanner;
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

        foreach (['kz', 'en', 'ru'] as $locale) {
            if ($banner->{"image_url_{$locale}"} && Storage::disk('s3')->exists($banner->{"image_path_{$locale}"})) {
                Storage::disk('s3')->delete($banner->{"image_path_{$locale}"});
            }
        }

        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

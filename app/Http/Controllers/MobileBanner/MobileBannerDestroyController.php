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

        foreach (['ru_image_url', 'kz_image_url', 'en_image_url'] as $locale) {
            $filePath = 'public' . str_replace('/storage', '', $banner->$locale);
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        $banner->delete();

        return $this->response([], 'Баннер успешно удален!');
    }
}

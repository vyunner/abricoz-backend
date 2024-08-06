<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Category
 */
class CategoryDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($category->desktop_image_url) {
            $desktop_image_url = 'public' . str_replace('/storage', '', $category->desktop_image_url);
            Storage::delete($desktop_image_url);
        }
        if ($category->mobile_image_url) {
            $mobile_image_url = 'public' . str_replace('/storage', '', $category->mobile_image_url);
            Storage::delete($mobile_image_url);
        }

        $category->delete();

        return $this->response([], 'Категория успешно удалена!');
    }
}

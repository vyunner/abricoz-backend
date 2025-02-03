<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * @group Category
 */
class CategoryDestroyController extends Controller
{
    /**
     * Удаление
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $category = Category::findOrFail($id);

        if ($category->mobile_image_url && Storage::disk('s3')->exists($category->mobile_image_path)) {
            Storage::disk('s3')->delete($category->mobile_image_path);
        }

        $category->delete();

        return $this->response([], 'Категория успешно удалена!');
    }
}

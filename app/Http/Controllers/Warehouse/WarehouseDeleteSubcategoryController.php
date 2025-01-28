<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouse
 */
class WarehouseDeleteSubcategoryController extends Controller
{
    /**
     * Удаление подкатегории
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        if ($subcategory->image_url && Storage::disk('s3')->exists($subcategory->image_path)) {
            Storage::disk('s3')->delete($subcategory->image_path);
        }

        $subcategory->delete();

        return $this->response(null, 'Subcategory deleted successfully');
    }
}

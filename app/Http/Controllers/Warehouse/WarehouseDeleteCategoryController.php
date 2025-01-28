<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Category;

/**
 * @group Warehouse
 */
class WarehouseDeleteCategoryController extends Controller
{
    /**
     * Удаление категории
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->response(null, 'Категория успешно удалена');
    }
}

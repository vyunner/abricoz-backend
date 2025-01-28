<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseUpdateCategoryRequest;
use App\Models\Category;

/**
 * @group Warehouse
 */
class WarehouseUpdateCategoryController extends Controller
{
    /**
     * Обновление категории
     *
     * @param WarehouseUpdateCategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehouseUpdateCategoryRequest $request, int $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);

        $category->update($data);

        return $this->response($category, 'Категория успешно обновлена');
    }
}

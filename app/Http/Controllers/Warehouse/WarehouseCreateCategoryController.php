<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseCreateCategoryRequest;
use App\Models\Category;

/**
 * @group Warehouse
 */
class WarehouseCreateCategoryController extends Controller
{
    /**
     * Создание категории
     *
     * @param WarehouseCreateCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehouseCreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return $this->response($category, 'Категория успешно создана');
    }
}

<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseCreateCategoryRequest;
use App\Models\Category;

class WarehouseCreateCategoryController extends Controller
{
    public function __invoke(WarehouseCreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return $this->response($category, 'Категория успешно создана');
    }
}

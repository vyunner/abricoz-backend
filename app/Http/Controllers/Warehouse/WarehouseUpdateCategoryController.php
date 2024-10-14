<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseUpdateCategoryRequest;
use App\Models\Category;

class WarehouseUpdateCategoryController extends Controller
{
    public function __invoke(WarehouseUpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return $this->response($category, 'Категория успешно обновлена');
    }
}

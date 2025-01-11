<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Category;

class WarehouseDeleteCategoryController extends Controller
{
    public function __invoke($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return $this->response(null, 'Категория успешно удалена');
    }
}

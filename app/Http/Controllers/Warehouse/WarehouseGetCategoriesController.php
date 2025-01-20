<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WarehouseGetCategoriesController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name_ru', 'LIKE', "%{$search}%")
                ->orWhere('name_kz', 'LIKE', "%{$search}%");
        }

        $categories = $query->get();

        return $this->response($categories, 'Категории успешно получены');
    }
}

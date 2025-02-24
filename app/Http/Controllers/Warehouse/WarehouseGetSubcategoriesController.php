<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group Warehouse
 */
class WarehouseGetSubcategoriesController extends Controller
{
    /**
     * Получение списка подкатегорий
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = SubCategory::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $subcategories = $query->get();

        return $this->response($subcategories, 'Subcategories retrieved successfully');
    }
}

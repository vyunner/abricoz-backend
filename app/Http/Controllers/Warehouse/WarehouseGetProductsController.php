<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseGetProductsRequest;
use App\Models\Product;

class WarehouseGetProductsController extends Controller
{
    public function __invoke(WarehouseGetProductsRequest $request)
    {
        $query = Product::query();

        if ($request->filled('category_id')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        if ($request->filled('subcategory_id')) {
            $query->where('subcategory_id', $request->subcategory_id);
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        $products = $query->paginate(10);

        return $this->response($products, 'Products retrieved successfully');
    }
}

<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeadWarehouse\HeadWarehouseSearchProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class HeadWarehouseSearchProductController extends Controller
{
    public function __invoke(HeadWarehouseSearchProductRequest $request)
    {
        $validated = $request->validated();

        $search = $validated['search'];

        $products = Product::where('name_ru', 'like', "%{$search}%")
            ->limit(20)
            ->get();

        return response()->json($products);
    }
}

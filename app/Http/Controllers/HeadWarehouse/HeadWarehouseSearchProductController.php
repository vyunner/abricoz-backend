<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HeadWarehouseSearchProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('search');

        if (!$search) {
            return response()->json(['message' => 'Search query is required'], 400);
        }

        $products = Product::where('name_ru', 'like', "%{$search}%")
            ->limit(20)
            ->get();

        return response()->json($products);
    }
}

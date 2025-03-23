<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HeadWarehouseSearchProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required|string|min:1|max:255',
        ]);

        $search = $validated['search'];

        $products = Product::where('name_ru', 'like', "%{$search}%")
            ->limit(20)
            ->get();

        return response()->json($products);
    }
}

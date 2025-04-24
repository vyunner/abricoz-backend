<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PosSearchProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $barcode = $request->input('barcode');
        $name = $request->input('name');

        if ($barcode) {
            $product = Product::where('barcode', $barcode)->first();

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            return response()->json($product);
        }

        if ($name) {
            $products = Product::where('name_ru', 'like', '%' . $name . '%')
                ->take(10)
                ->get();

            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }

            return response()->json($products);
        }

        return response()->json(['message' => 'Barcode or name is required'], 400);
    }
}

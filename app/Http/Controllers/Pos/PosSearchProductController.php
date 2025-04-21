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
        } elseif ($name) {
            $product = Product::where('name_ru', 'like', '%' . $name . '%')->first();
        } else {
            return response()->json(['message' => 'Barcode or name is required'], 400);
        }

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
}

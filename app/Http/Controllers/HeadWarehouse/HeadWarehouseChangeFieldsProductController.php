<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HeadWarehouseChangeFieldsProductController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'price_with_discount' => 'required|integer',
            'weight' => 'nullable|integer',
            'is_active' => 'required|boolean',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($validated);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }
}

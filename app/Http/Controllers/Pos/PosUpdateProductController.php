<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PosUpdateProductController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'barcode' => 'nullable|string',
            'photo_url' => 'nullable|string',
            'where' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_kz' => 'nullable|string',
            'description_ru' => 'nullable|string',
            'description_kz' => 'nullable|string',
            'weight' => 'nullable|string',
            'calories' => 'nullable|numeric',
            'proteins' => 'nullable|numeric',
            'fats' => 'nullable|numeric',
            'carbohydrates' => 'nullable|numeric',
            'price' => 'nullable|integer',
            'discount' => 'nullable|integer',
            'price_with_discount' => 'nullable|integer',
            'price_cost' => 'nullable|integer',
            'total_sales' => 'nullable|integer',
            'amount' => 'nullable|integer',
            'stock_quantity' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $product->fill($data)->save();

        return response()->json($product);
    }
}

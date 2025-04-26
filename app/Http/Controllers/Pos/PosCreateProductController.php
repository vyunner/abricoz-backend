<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PosCreateProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'subcategory_id'      => 'required|exists:subcategories,id',
            'barcode'             => 'required|string|max:255',
            'photo_url'           => 'required|string|max:255',
            'where'               => 'nullable|string|max:255',
            'manufacturer'        => 'nullable|string|max:255',
            'name_ru'             => 'required|string|max:255',
            'name_kz'             => 'required|string|max:255',
            'description_ru'      => 'required|string',
            'description_kz'      => 'required|string',
            'weight'              => 'required|string|max:255',
            'calories'            => 'nullable|numeric',
            'proteins'            => 'nullable|numeric',
            'fats'                => 'nullable|numeric',
            'carbohydrates'       => 'nullable|numeric',
            'price'               => 'required|integer',
            'discount'            => 'nullable|integer',
            'price_with_discount' => 'required|integer',
            'price_cost'          => 'required|integer',
            'total_sales'         => 'nullable|integer',
            'amount'              => 'required|integer',
            'stock_quantity'      => 'required|integer',
            'is_active'           => 'boolean',
        ]);

        $product = Product::create([
            ...$data,
            'total_sales' => $data['total_sales'] ?? 0,
            'amount' => $data['amount'] ?? 0,
            'stock_quantity' => $data['stock_quantity'] ?? 0,
            'is_active' => $data['is_active'] ?? true,
        ]);

        return response()->json([
            'message' => 'Товар успешно создан',
            'product' => $product,
        ]);
    }
}

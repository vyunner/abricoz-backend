<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductLog;

class PosChangeProductAmountController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock_quantity' => 'nullable|integer',
            'amount' => 'nullable|integer',
            'price_cost' => 'nullable|integer',
            'price' => 'nullable|integer',
            'discount' => 'nullable|integer',
            'price_with_discount' => 'nullable|integer',
        ]);

        $product = Product::findOrFail($data['product_id']);

        // Применяем изменения количества
        $product->stock_quantity += $data['stock_quantity'] ?? 0;
        $product->amount += $data['amount'] ?? 0;

        // Обновляем переданные поля
        foreach (['price', 'discount', 'price_with_discount', 'price_cost'] as $field) {
            if (isset($data[$field])) {
                $product->$field = $data[$field];
            }
        }

        $product->save();

        // Логируем только если изменён остаток на складе
        if (!empty($data['stock_quantity'])) {
            ProductLog::create([
                'product_id' => $product->id,
                'stock_quantity' => $data['stock_quantity'],
                'price_cost' => $data['price_cost'] ?? null,
                'price' => $data['price'] ?? null,
            ]);
        }

        return response()->json($product);
    }
}

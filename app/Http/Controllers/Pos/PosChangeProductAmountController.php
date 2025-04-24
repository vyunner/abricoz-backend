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
        ]);

        $product = Product::findOrFail($data['product_id']);

        $stockDelta = array_key_exists('stock_quantity', $data) ? $data['stock_quantity'] : 0;
        $amountDelta = array_key_exists('amount', $data) ? $data['amount'] : 0;

        $product->stock_quantity += $stockDelta;
        $product->amount += $amountDelta;
        $product->save();

        if ($stockDelta !== 0) {
            ProductLog::create([
                'product_id' => $product->id,
                'stock_quantity' => $stockDelta,
                'price_cost' => $data['price_cost'] ?? null,
                'price' => $data['price'] ?? null,
            ]);
        }

        return response()->json($product);
    }
}

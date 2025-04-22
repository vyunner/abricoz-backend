<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PosChangeProductAmountController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock_quantity' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $product->stock_quantity += $data['stock_quantity'];
        $product->amount += $data['amount'];

        $product->save();

        return response()->json($product);
    }
}

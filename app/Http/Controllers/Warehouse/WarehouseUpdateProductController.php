<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseUpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class WarehouseUpdateProductController extends Controller
{
    public function __invoke(WarehouseUpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        if (isset($data['is_active']) && $data['is_active'] == 1) {
            $amount = $data['amount'] ?? $product->amount;
            if ($amount <= 0) {
                return $this->response(null, 'Cannot activate a product with zero or negative amount', 400);
            }
        }

        $product->update($data);

        return $this->response($product, 'Product updated successfully');
    }
}

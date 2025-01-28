<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseUpdateProductRequest;
use App\Models\Product;

/**
 * @group Warehouse
 */
class WarehouseUpdateProductController extends Controller
{
    /**
     * Изменение продукта
     * 
     * @param WarehouseUpdateProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehouseUpdateProductRequest $request, int $id)
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

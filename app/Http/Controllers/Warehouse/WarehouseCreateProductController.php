<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseCreateProductRequest;
use App\Models\Product;

/**
 * @group Warehouse
 */
class WarehouseCreateProductController extends Controller
{
    /**
     * Создание товара
     *
     * @param WarehouseCreateProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehouseCreateProductRequest $request)
    {
        $data = $request->validated();

        $product = Product::create($data);

        return $this->response($product, 'Product created successfully');
    }
}

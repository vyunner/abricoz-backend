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

        // Устанавливаем 'photo_url' в "null", если оно отсутствует
        if (!array_key_exists('photo_url', $data)) {
            $data['photo_url'] = 'null';
        }

        $product = Product::create($data);

        return $this->response($product, 'Product created successfully');
    }
}

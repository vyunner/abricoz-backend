<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Product;

/**
 * @group Product
 */
class ProductStoreController extends Controller
{
    /**
     * Создание
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductStoreRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);
        $product = $product->load(['subcategory', 'brand', 'country']);

        return $this->response($product, 'Продукт успешно создан!');
    }
}

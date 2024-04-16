<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;

/**
 * @group Product
 */
class ProductUpdateController extends Controller
{
    /**
     * Обновление
     * @param ProductUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);
        $product->fill($validatedData)->save();
        $product->load(['subcategory', 'brand', 'country']);

        return $this->response($product, 'Продукт успешно изменен!');
    }
}

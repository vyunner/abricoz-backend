<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProductUpdateRequest $request, $id, ProductService $productService)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($id);
        $product->fill($validatedData)->save();
        $product->load(['subcategory', 'brand', 'country']);

        $product = $productService->transformProduct($product);

        return $this->response($product, 'Продукт успешно изменен!');
    }
}

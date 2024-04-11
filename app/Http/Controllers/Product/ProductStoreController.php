<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ProductStoreRequest $request, ProductService $productService)
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        $product = $product->load(['subcategory', 'brand', 'country']);
        $product = $productService->transformProduct($product);

        return $this->response($product, 'Продукт успешно создан!');
    }
}

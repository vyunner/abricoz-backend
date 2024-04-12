<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __invoke(ProductStoreRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        $product = $product->load(['subcategory', 'brand', 'country']);
        $product = ProductResource::collection($product);

        return $this->response($product, 'Продукт успешно создан!');
    }
}

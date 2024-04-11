<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{
    public function __invoke(Request $request, $id, ProductService $productService)
    {
        $product = $productService->transformProduct(Product::with(['subcategory', 'brand', 'country'])->findOrFail($id));

        return $this->response($product, 'Продукт успешно отображен!');
    }
}

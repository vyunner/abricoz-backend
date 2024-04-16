<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 */
class ProductShowController extends Controller
{
    /**
     * Элемент
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $product = ProductResource::collection(Product::with(['subcategory', 'brand', 'country'])->findOrFail($id));

        return $this->response($product, 'Продукт успешно отображен!');
    }
}

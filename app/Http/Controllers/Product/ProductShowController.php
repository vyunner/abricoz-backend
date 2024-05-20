<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
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
        $product = Product::with(['subcategory', 'brand', 'country'])->findOrFail($id);
        $similarProducts = Product::where('id', '!=', $id)
            ->where(['subcategory_id' => $product->subcategory_id])
            ->with(['subcategory', 'brand', 'country'])
            ->take(15)
            ->get();

        return $this->response(['product' => $product, 'similarProducts' => $similarProducts], 'Продукт успешно отображен!');
    }
}

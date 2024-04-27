<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductGetDiscountsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 */
class ProductGetDiscountsController extends Controller
{
    /**
     * Топ 15 товаров со скидкой
     * @param ProductGetDiscountsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductGetDiscountsRequest $request){
        $products = Product::where('discount', '>', 0)
            ->with(['subcategory', 'brand', 'country'])
            ->orderByDesc('discount')
            ->take(15)
            ->get();;

        return $this->response($products, 'Список продуктов со скидкой успешно загружен!');
    }
}

<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 */
class ProductGetTopSellingController extends Controller
{
    /**
     * Топ 15 продаваевых продуктов
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request){
        $products = Product::orderByDesc('total_sales')->take(15)->get();

        return $this->response($products, 'Список самых продаваемых продуктов успешно загружен!');
    }
}

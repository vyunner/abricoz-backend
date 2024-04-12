<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);

            $products = Product::with(['subcategory', 'brand', 'country'])->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $products->currentPage(),
                'products' => ProductResource::collection($products->items()),
                'total' => $products->total(),
            ], 'Список продуктов успешно загружен!');
        }

        $allProducts = ProductResource::collection(Product::with(['subcategory', 'brand', 'country'])->get());

        return $this->response($allProducts, 'Список продуктов успешно загружен!');
    }
}

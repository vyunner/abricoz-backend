<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 */
class ProductIndexController extends Controller
{
    /**
     * Список
     * @param ProductIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(ProductIndexRequest $request)
    {
        $query = Product::with(['subcategory', 'brand', 'country']);

        if (!$request->user()->hasRole('admin')) {
            $query->where('is_active', 1);
        }

        if ($request->has('perPage')) {
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);

            $products = $query->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $products->currentPage(),
                'products' => ProductResource::collection($products->items()),
                'total' => $products->total(),
            ], 'Список продуктов успешно загружен!');
        }

        $allProducts = ProductResource::collection($query->get());

        return $this->response($allProducts, 'Список продуктов успешно загружен!');
    }
}

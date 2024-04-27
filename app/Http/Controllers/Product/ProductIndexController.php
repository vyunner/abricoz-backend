<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Product;

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
        $user = $request->user();
        $query = Product::with(['subcategory', 'brand', 'country']);

        if (!$user || !$user->hasRole('admin')) {
            $query->where('is_active', 1);
        }

        if ($request->has('name')) {
            $name = $request->input('name');
            $query->where(function ($query) use ($name) {
                $query->where('name_ru', 'like', '%' . $name . '%')
                    ->orWhere('name_kz', 'like', '%' . $name . '%')
                    ->orWhere('name_en', 'like', '%' . $name . '%');
            });
        }

        if ($request->has('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->has('subcategory_id')) {
            $query->where('subcategory_id', $request->subcategory_id);
        }

        if ($request->has('category_id')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        if ($request->has('perPage')) {
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);
            $products = $query->paginate($perPage, ['*'], 'page', $page);

            $response = [
                'current_page' => $products->currentPage(),
                'total' => $products->total(),
                'products' => $products->items(),
            ];
        } else {
            $response = $query->get();
        }

        return $this->response($response, 'Список продуктов успешно загружен!');
    }
}

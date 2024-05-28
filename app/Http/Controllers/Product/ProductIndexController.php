<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Brand;
use App\Models\Country;
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

        if ($request->filled('country_id')) {
            $query->whereIn('country_id', $request->country_id);
        }

        if ($request->filled('brand_id')) {
            $query->whereIn('brand_id', $request->brand_id);
        }

        if ($request->filled('subcategory_id')) {
            $query->whereIn('subcategory_id', $request->subcategory_id);
        }

        if ($request->has('category_id')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        $priceRangeQuery = clone $query;

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $minPrice = $priceRangeQuery->min('price');
        $maxPrice = $priceRangeQuery->max('price');

        $countryIds = $query->pluck('country_id')->unique();
        $countries = Country::whereIn('id', $countryIds)->get();

        $brandIds = $query->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->get();

        if ($request->has('perPage')) {
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);
            $products = $query->paginate($perPage, ['*'], 'page', $page);

            $response = [
                'current_page' => $products->currentPage(),
                'total' => $products->total(),
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'countries' => $countries,
                'brands' => $brands,
                'products' => $products->items(),
            ];
        } else {
            $response = [
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'countries' => $countries,
                'brands' => $brands,
                'products' => $query->get(),
            ];
        }

        return $this->response($response, 'Список продуктов успешно загружен!');
    }
}

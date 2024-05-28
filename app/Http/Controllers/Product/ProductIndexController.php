<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Product;
use App\Models\SubCategory;

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

        $subcategoryIds = SubCategory::query();
        if ($request->has('category_id')) {
            $subcategoryIds->where('category_id', $request->category_id);
        }
        $subcategoryIds = $subcategoryIds->pluck('id');

        $priceRangeQuery = clone $query;

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $minPrice = $priceRangeQuery->min('price');
        $maxPrice = $priceRangeQuery->max('price');

        $subcategoryIds = $subcategoryIds->pluck('id');

        $countryBrandQuery = Product::whereIn('subcategory_id', $subcategoryIds)->select('country_id', 'brand_id')->distinct();

        $countries = Country::whereIn('id', $countryBrandQuery->pluck('country_id'))->get();
        $brands = Brand::whereIn('id', $countryBrandQuery->pluck('brand_id'))->get();

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

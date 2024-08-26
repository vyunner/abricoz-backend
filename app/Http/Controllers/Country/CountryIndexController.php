<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryIndexRequest;
use App\Models\Country;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group Country
 */
class CountryIndexController extends Controller
{
    /**
     * Список
     * @param CountryIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CountryIndexRequest $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $countries = Country::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $countries->currentPage(),
                'total' => $countries->total(),
                'total_pages' => $countries->lastPage(),
                'countries' => $countries->items(),
            ], 'Список стран успешно загружен!');
        }

        $countries = Country::query();

        if ($request->filled('subcategory_id') || $request->has('category_id') || $request->has('name')) {
            $query = Product::query();

            if ($request->has('name')) {
                $name = $request->name;
                $query->where(function ($query) use ($name) {
                    $query->where('name_ru', 'like', '%' . $name . '%')
                        ->orWhere('name_kz', 'like', '%' . $name . '%')
                        ->orWhere('name_en', 'like', '%' . $name . '%');
                });
            }
            if ($request->filled('subcategory_id')) {
                $subcategoryIds = $request->subcategory_id;
                $query->whereIn('subcategory_id', $subcategoryIds);
            }
            if ($request->has('category_id')) {
                $categoryId = $request->category_id;
                $subcategories = SubCategory::where('category_id', $categoryId)->pluck('id');
                $query->whereIn('subcategory_id', $subcategories);
            }

            $products = $query->with(['country'])->get();
            $countries = $products->pluck('country')->unique('id');
        } else {
            $countries = $countries->get();
        }

        return $this->response($countries->values(), 'Список стран успешно загружен!');
    }
}

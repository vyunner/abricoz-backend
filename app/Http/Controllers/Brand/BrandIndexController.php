<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandIndexRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

/**
 * @group Brand
 */
class BrandIndexController extends Controller
{
    /**
     * Список
     * @param BrandIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(BrandIndexRequest $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $brands = Brand::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $brands->currentPage(),
                'total' => $brands->total(),
                'brands' => $brands->items(),
            ], 'Список брендов успешно загружен!');
        }

        if ($request->filled('subcategory_id') || $request->has('category_id') || $request->has('name')){
            $query = Product::query();

            if ($request->has('name')){
                $name = $request->name;
                $query->where(function ($query) use ($name) {
                    $query->where('name_ru', 'like', '%' . $name . '%')
                        ->orWhere('name_kz', 'like', '%' . $name . '%')
                        ->orWhere('name_en', 'like', '%' . $name . '%');
                });
            }
            elseif ($request->filled('subcategory_id')) {
                $subcategoryIds = $request->subcategory_id;
                $query->whereIn('subcategory_id', $subcategoryIds);
            } elseif ($request->has('category_id')) {
                $categoryId = $request->category_id;
                $subcategories = SubCategory::where('category_id', $categoryId)->get();
                $query->whereIn('subcategory_id', $subcategories->pluck('id'));
            }

            $products = $query->with(['brand'])->get();
            $brands = $products->pluck('brand')->unique('id');
        }
        else {
            $brands = Brand::all();
        }

        return $this->response($brands, 'Список брендов успешно загружен!');
    }
}

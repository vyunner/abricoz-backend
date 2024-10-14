<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WarehouseSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->input('name');

        // Retrieve products where any name field matches approximately 70%
        $products = Product::where(function ($query) use ($name) {
            $query->where('name_ru', 'LIKE', "%{$name}%")
                ->orWhere('name_kz', 'LIKE', "%{$name}%")
                ->orWhere('name_en', 'LIKE', "%{$name}%");
        })->get();

        // Filter results based on similarity percentage
        $filteredProducts = $products->filter(function ($product) use ($name) {
            $similarity = 0;

            foreach (['name_ru', 'name_kz', 'name_en'] as $field) {
                similar_text($name, $product->$field, $percent);
                if ($percent > $similarity) {
                    $similarity = $percent;
                }
            }

            return $similarity >= 70;
        });

        return $this->response($filteredProducts->values(), 'Products retrieved successfully');
    }
}

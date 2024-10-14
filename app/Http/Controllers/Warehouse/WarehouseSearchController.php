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

        // Приводим поисковый запрос к нижнему регистру
        $name = mb_strtolower($name);

        // Получаем продукты с подгруженными связями
        $products = Product::with(['subcategory', 'brand', 'country'])->get();

        // Фильтруем продукты по сходству
        $filteredProducts = $products->filter(function ($product) use ($name) {
            $maxSimilarity = 0;

            foreach (['name_ru', 'name_kz', 'name_en'] as $field) {
                // Приводим название продукта к нижнему регистру
                $productName = mb_strtolower($product->$field);
                similar_text($name, $productName, $percent);

                if ($percent > $maxSimilarity) {
                    $maxSimilarity = $percent;
                }
            }

            return $maxSimilarity >= 50;
        });

        return $this->response($filteredProducts->values(), 'Продукты успешно получены');
    }
}

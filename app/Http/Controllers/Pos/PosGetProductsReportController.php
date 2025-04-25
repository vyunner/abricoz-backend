<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class PosGetProductsReportController extends Controller
{
    public function __invoke()
    {
        $subcategories = SubCategory::select('id', 'name_ru')
            ->with(['products' => function ($query) {
                $query->select('id', 'subcategory_id', 'name_ru', 'weight', 'amount', 'stock_quantity', 'photo_url')
                    ->where('is_active', 1);
            }])
            ->get()
            ->filter(function ($subcategory) {
                return $subcategory->products->isNotEmpty();
            })
            ->map(function ($subcategory) {
                return [
                    'name_ru' => $subcategory->name_ru,
                    'products' => $subcategory->products->map(function ($product) {
                        return [
                            'subcategory_id' => $product->subcategory_id,
                            'name_ru' => $product->name_ru,
                            'weight' => $product->weight,
                            'amount' => $product->amount,
                            'stock_quantity' => $product->stock_quantity,
                            'photo_url' => $product->photo_url,
                        ];
                    })->values(),
                ];
            })
            ->values();

        return response()->json($subcategories);
    }
}

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
                $query->select('id', 'subcategory_id', 'name_ru', 'weight', 'amount', 'stock_quantity', 'photo_url', 'is_active')
                    ->where('is_active', 1);
            }])
            ->get()
            ->filter(function ($subcategory) {
                return $subcategory->products->isNotEmpty();
            });

        $productIds = $subcategories->flatMap(fn ($s) => $s->products->pluck('id'))->unique()->values();

        $sales = DB::table('order_products as op')
            ->join('orders as o', 'o.id', '=', 'op.order_id')
            ->select(
                'op.product_id',
                DB::raw('DATE(o.delivery_date) as date'),
                DB::raw('SUM(op.product_quantity) as total_quantity')
            )
            ->whereIn('op.product_id', $productIds)
            ->where('o.order_status_id', '!=', 6)
            ->groupBy('op.product_id', DB::raw('DATE(o.delivery_date)'))
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy('product_id');

        $result = $subcategories->map(function ($subcategory) use ($sales) {
            return [
                'name_ru' => $subcategory->name_ru,
                'products' => $subcategory->products->map(function ($product) use ($sales) {
                    return [
                        'product_id' => $product->id,
                        'subcategory_id' => $product->subcategory_id,
                        'name_ru' => $product->name_ru,
                        'weight' => $product->weight,
                        'amount' => $product->amount,
                        'stock_quantity' => $product->stock_quantity,
                        'photo_url' => $product->photo_url,
                        'sales_by_day' => optional($sales[$product->id])->map(function ($sale) {
                                return [
                                    'date' => $sale->date,
                                    'total_quantity' => $sale->total_quantity
                                ];
                            })->values() ?? []
                    ];
                })->values()
            ];
        })->values();

        return response()->json($result);
    }
}

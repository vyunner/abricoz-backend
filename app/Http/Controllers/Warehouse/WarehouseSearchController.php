<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * @group Warehouse
 */
class WarehouseSearchController extends Controller
{
    /**
     * Поиск продуктов по названию
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $name = $request->input('name');

        $name = mb_strtolower($name);

        $products = Product::with(['subcategory'])
            ->whereRaw('LOWER(name_ru) LIKE ?', ['%' . $name . '%'])
            ->orWhereRaw('LOWER(name_kz) LIKE ?', ['%' . $name . '%'])
            ->get();

        return $this->response($products, 'Продукты успешно получены');
    }
}

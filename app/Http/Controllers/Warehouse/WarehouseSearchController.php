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

        // Выполняем поиск в базе данных
        $products = Product::with(['subcategory'])
            ->whereRaw('LOWER(name_ru) LIKE ?', ['%' . $name . '%'])
            ->orWhereRaw('LOWER(name_kz) LIKE ?', ['%' . $name . '%'])
            ->get();

        return $this->response($products, 'Продукты успешно получены');
    }
}

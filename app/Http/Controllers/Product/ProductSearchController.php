<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductSearchRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product
 */
class ProductSearchController extends Controller
{
    /**
     * Поиск
     * @param ProductSearchRequest $request
     * @return mixed
     */
    public function __invoke(ProductSearchRequest $request)
    {
        $term = $request->input('name');

        // Выполняем поиск по всем языковым полям, фильтруем по is_active и возвращаем только 10 записей
        $products = Product::where(function($query) use ($term) {
            $query->where('name_ru', 'like', '%' . $term . '%')
                ->orWhere('name_kz', 'like', '%' . $term . '%')
                ->orWhere('name_en', 'like', '%' . $term . '%');
        })
            ->where('is_active', 1) // Условие для активных продуктов
            ->select('id', 'name_ru', 'name_kz', 'name_en') // Только нужные поля
            ->limit(10) // Ограничиваем результат до 10 записей
            ->get();

        return $this->response($products, 'Результаты поиска');
    }
}

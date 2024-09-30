<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouseman
 */
class WarehousemanIndexController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $orders = Order::whereIn('order_status_id', [1, 2])
            ->with('deliveryInterval:id,name')
            ->orderBy('delivery_date', 'asc')
            ->orderBy('delivery_interval_id', 'asc')
            ->paginate(15, ['id', 'delivery_date', 'delivery_interval_id']);

        // Преобразуем коллекцию заказов
        $transformedOrders = $orders->getCollection()->transform(function ($order) {
            return [
                'id' => $order->id,
                'delivery_date' => $order->delivery_date,
                'delivery_interval_name' => $order->deliveryInterval->name,
            ];
        });

        // Заменяем коллекцию в пагинаторе на преобразованную
        $orders->setCollection($transformedOrders);

        // Выберите один из следующих вариантов возврата:

        // Вариант 1: Возврат только данных заказов без метаданных пагинации
        // return $this->response($orders->items(), 'Список заказов с статусом 1 и 2');

        // Вариант 2: Возврат данных заказов с метаданными пагинации
        return $this->response([
            'data' => $orders->items(),
            'pagination' => [
                'current_page' => $orders->currentPage(),
                'last_page' => $orders->lastPage(),
                'per_page' => $orders->perPage(),
                'total' => $orders->total(),
                'next_page_url' => $orders->nextPageUrl(),
                'prev_page_url' => $orders->previousPageUrl(),
            ],
        ], 'Список заказов с статусом 1 и 2');
    }
}

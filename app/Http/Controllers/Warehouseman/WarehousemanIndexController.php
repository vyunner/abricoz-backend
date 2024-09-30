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
            ->get(['id', 'delivery_date', 'delivery_interval_id']);

        // Трансформируем коллекцию заказов
        $transformedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'delivery_date' => $order->delivery_date,
                'delivery_interval_name' => $order->deliveryInterval->name,
            ];
        });

        return $this->response($transformedOrders, 'Список заказов с статусом 1 и 2');
    }
}

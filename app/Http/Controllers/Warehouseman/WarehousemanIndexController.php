<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Warehouseman
 */
class WarehousemanIndexController extends Controller
{
    /**
     * Отображение списка заказов со статусом 1 и 2
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $orders = Order::from('orders')
            ->leftJoin('order_assignments', function ($join) {
                $join->on('orders.id', '=', 'order_assignments.order_id')
                    ->where('order_assignments.role_id', 2);
            })
            ->leftJoin('users', 'order_assignments.user_id', '=', 'users.id')
            ->whereIn('orders.order_status_id', [1, 2])
            ->leftJoin('delivery_intervals', 'orders.delivery_interval_id', '=', 'delivery_intervals.id')
            ->leftJoin('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
            ->orderBy('orders.delivery_date', 'asc')
            ->orderBy('orders.delivery_interval_id', 'asc')
            ->get([
                'orders.id',
                'orders.order_status_id',
                'orders.delivery_date',
                'delivery_intervals.name as delivery_interval_name',
                'order_statuses.name as order_status_name',
                DB::raw("CONCAT(users.firstname, ' ', users.lastname) as fullname"),
            ]);

        return $this->response($orders, 'Список заказов со статусом 1 и 2');
    }
}

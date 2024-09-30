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
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $orders = Order::whereIn('order_status_id', [1, 2])
            ->with([
                'deliveryInterval:id,name',
                'orderStatus:id,name'
            ])
            ->orderBy('delivery_date', 'asc')
            ->orderBy('delivery_interval_id', 'asc')
            ->select([
                'id',
                'delivery_date',
                'delivery_interval_id',
                'order_status_id',
            ])
            ->addSelect([
                'fullname' => function ($query) {
                    $query->select(DB::raw("CONCAT(users.firstname, ' ', users.lastname)"))
                        ->from('users')
                        ->join('order_assignments', 'users.id', '=', 'order_assignments.user_id')
                        ->whereColumn('order_assignments.order_id', 'orders.id')
                        ->where('order_assignments.role_id', 2)
                        ->limit(1);
                }
            ])
            ->get();

        // Трансформируем коллекцию заказов
        $transformedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'delivery_date' => $order->delivery_date,
                'delivery_interval_name' => $order->deliveryInterval->name,
                'order_status_name' => $order->orderStatus->name,
                'fullname' => $order->fullname,
            ];
        });

        return $this->response($transformedOrders, 'Список заказов со статусом 1 и 2');
    }
}

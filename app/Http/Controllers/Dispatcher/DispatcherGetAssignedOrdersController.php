<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DispatcherGetAssignedOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        // Получаем заказы с назначенным курьером со статусами 1, 2, 3, 4
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
            ->whereHas('assignments', function ($query) {
                $query->where('role_id', 3); // Айди роли курьера
            })
            ->get();

        return response()->json($orders);
    }
}

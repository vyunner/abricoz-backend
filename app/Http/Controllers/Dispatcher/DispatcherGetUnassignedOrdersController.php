<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DispatcherGetUnassignedOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        // Получаем заказы без назначенного курьера со статусами 1, 2, 3, 4
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
            ->whereDoesntHave('assignments', function ($query) {
                $query->where('role_id', 3); // Айди роли курьера
            })
            ->get();

        return response()->json($orders);
    }
}

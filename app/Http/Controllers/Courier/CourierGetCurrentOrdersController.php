<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CourierGetCurrentOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        $courier = Auth::user();

        // Проверяем, что пользователь имеет роль курьера
        if (!$courier->hasRole('courier')) {
            return response()->json(['error' => 'Доступ запрещен'], 403);
        }

        // Получаем заказы, назначенные этому курьеру, со статусами 1, 2, 3, 4
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
            ->whereHas('assignments', function ($query) use ($courier) {
                $query->where('user_id', $courier->id)
                    ->where('role_id', 3); // Айди роли курьера
            })
            ->get();

        return response()->json($orders);
    }
}

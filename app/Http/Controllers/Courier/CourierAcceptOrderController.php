<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\CourierCompleteOrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CourierAcceptOrderController extends Controller
{
    public function __invoke(CourierCompleteOrderRequest $request)
    {
        $courier = Auth::user();
        $orderId = $request->validated()['order_id'];

        // Проверяем, что заказ назначен этому курьеру
        $order = Order::where('id', $orderId)
            ->whereHas('assignments', function ($query) use ($courier) {
                $query->where('user_id', $courier->id)
                    ->where('role_id', 3);
            })
            ->first();

        if (!$order) {
            return $this->response(null, 'Заказ не найден или не назначен этому курьеру', 404);
        }

        // Проверяем статус заказа
        if (!in_array($order->order_status_id, [3])) {
            return $this->response(null, 'Статус заказа не позволяет его взять', 400);
        }

        // Меняем статус заказа на 4
        $order->order_status_id = 4;
        $order->save();

        return $this->response(null, 'Статус изменен', 200);
    }
}

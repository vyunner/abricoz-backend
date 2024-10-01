<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouseman\WarehousemanCompleteRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class WarehousemanCompleteController extends Controller
{
    /**
     * Завершение заказа складским работником
     * @param WarehousemanCompleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehousemanCompleteRequest $request)
    {
        $userId = $request->user()->id;
        $orderId = $request->order_id;

        // Проверяем, что заказ закреплен за текущим пользователем с role_id = 2
        $orderAssigned = Order::where('id', $orderId)
            ->whereHas('assignments', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('role_id', 2);
            })
            ->first();

        if (!$orderAssigned) {
            return $this->response([], 'Этот заказ не закреплен за вами.', 400);
        }

        // Проверяем статус заказа
        if ($orderAssigned->order_status_id != 2) {
            return $this->response([], 'Этот заказ не может быть завершен. Некорректный статус заказа.', 400);
        }

        // Обновляем статус заказа на "собран" (order_status_id = 3)
        $orderAssigned->update([
            'order_status_id' => 3,
        ]);

        return $this->response([], 'Заказ успешно завершен.');
    }
}

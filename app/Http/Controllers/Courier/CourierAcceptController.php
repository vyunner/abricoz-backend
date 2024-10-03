<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\CourierAcceptRequest;
use App\Models\Order;
use App\Models\OrderAssignment;
use Illuminate\Http\Request;

class CourierAcceptController extends Controller
{
    /**
     * Принятие заказа курьером
     * @param CourierAcceptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CourierAcceptRequest $request)
    {
        $userId = $request->user()->id;
        $orderId = $request->order_id;
        $roleId = 3; // 3 для курьера

        // Проверяем, есть ли у пользователя незавершенные заказы
        $existingAssignment = OrderAssignment::where('user_id', $userId)
            ->where('role_id', $roleId)
            ->whereHas('order', function ($query) {
                $query->where('order_status_id', 4); // Статус "В пути"
            })
            ->first();

        if ($existingAssignment) {
            return $this->response([], 'У вас уже есть незавершенный заказ. Завершите его перед тем, как принять новый.', 400);
        }

        // Проверяем, не закреплен ли заказ за другим курьером
        $orderAssigned = OrderAssignment::where('order_id', $orderId)
            ->where('role_id', $roleId)
            ->exists();

        if ($orderAssigned) {
            return $this->response([], 'Этот заказ уже закреплен за другим курьером.', 400);
        }

        // Получаем заказ и проверяем его статус
        $order = Order::findOrFail($orderId);

        if ($order->order_status_id != 3) {
            return $this->response([], 'Этот заказ не может быть принят. Некорректный статус заказа.', 400);
        }

        // Создаем запись в таблице order_assignments
        OrderAssignment::create([
            'order_id' => $orderId,
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);

        // Обновляем статус заказа на "В пути" (order_status_id = 4)
        $order->update([
            'order_status_id' => 4,
        ]);

        return $this->response([], 'Заказ успешно закреплен за вами.');
    }
}

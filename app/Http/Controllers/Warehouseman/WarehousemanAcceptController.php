<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouseman\WarehousemanAcceptRequest;
use App\Models\Order;
use App\Models\OrderAssignment;
use Illuminate\Http\Request;

class WarehousemanAcceptController extends Controller
{
    /**
     * Закрепление заказа за складским работником
     * @param WarehousemanAcceptRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(WarehousemanAcceptRequest $request)
    {
        $userId = $request->user()->id;
        $orderId = $request->order_id;
        $roleId = 2; // Всегда 2 для складского работника

        // Проверяем, есть ли у пользователя незавершенные заказы
        $existingAssignment = OrderAssignment::where('user_id', $userId)
            ->where('role_id', $roleId)
            ->whereHas('order', function ($query) {
                $query->whereIn('order_status_id', [1, 2]);
            })
            ->first();

        if ($existingAssignment) {
            return $this->response([], 'У вас уже есть незавершенный заказ. Завершите его перед тем, как принять новый.', 400);
        }

        // Проверяем, не закреплен ли заказ за другим пользователем
        $orderAssigned = OrderAssignment::where('order_id', $orderId)
            ->where('role_id', $roleId)
            ->exists();

        if ($orderAssigned) {
            return $this->response([], 'Этот заказ уже закреплен за другим пользователем.', 400);
        }

        // Получаем заказ и проверяем его статус
        $order = Order::findOrFail($orderId);

        if ($order->order_status_id != 1) {
            return $this->response([], 'Этот заказ не может быть принят. Некорректный статус заказа.', 400);
        }

        // Создаем запись в таблице order_assignments
        OrderAssignment::create([
            'order_id' => $orderId,
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);

        // Обновляем статус заказа на "собирается" (order_status_id = 2)
        $order->update([
            'order_status_id' => 2,
        ]);

        return $this->response([], 'Заказ успешно закреплен за вами.');
    }
}

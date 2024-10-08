<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dispatcher\DispatcherAssignOrderRequest;
use App\Models\OrderAssignment;
use App\Models\User;
use App\Models\Order;

class DispatcherAssignOrdersController extends Controller
{
    public function __invoke(DispatcherAssignOrderRequest $request)
    {
        $data = $request->validated();

        $assignments = [];

        foreach ($data['order_user_ids'] as $item) {
            $orderId = $item['order_id'];
            $userId = $item['user_id'];

            // Проверяем, что пользователь имеет роль курьера
            $user = User::find($userId);
            if (!$user->hasRole('courier')) {
                return $this->response(null, "Пользователь ID $userId не является курьером", 400);
            }

            // Проверяем, что заказ не назначен другому курьеру
            $existingAssignment = OrderAssignment::where('order_id', $orderId)
                ->where('role_id', 3)
                ->first();

            if ($existingAssignment) {
                return $this->response(null, "Заказ ID $orderId уже назначен другому курьеру", 400);
            }

            // Создаем назначение
            $assignment = OrderAssignment::create([
                'order_id' => $orderId,
                'user_id' => $userId,
                'role_id' => 3, // Айди роли курьера
            ]);

            $assignments[] = $assignment;
        }

        return $this->response($assignments, 'Заказы успешно назначены курьерам', 200);
    }
}

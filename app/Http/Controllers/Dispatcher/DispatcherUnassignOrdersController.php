<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dispatcher\DispatcherUnassignOrderRequest;
use App\Models\OrderAssignment;

class DispatcherUnassignOrdersController extends Controller
{
    public function __invoke(DispatcherUnassignOrderRequest $request)
    {
        $data = $request->validated();

        $userId = $data['user_id'];
        $orderIds = $data['order_ids'];

        foreach ($orderIds as $orderId) {
            $assignment = OrderAssignment::where('order_id', $orderId)
                ->where('user_id', $userId)
                ->where('role_id', 3) // Айди роли курьера
                ->first();

            if (!$assignment) {
                return $this->response(null, "Назначение заказа ID $orderId на курьера ID $userId не найдено", 400);
            }

            $assignment->delete();
        }

        return $this->response(null, 'Заказы успешно сняты с курьера', 200);
    }
}

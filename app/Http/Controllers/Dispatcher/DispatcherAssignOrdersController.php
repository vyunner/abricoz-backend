<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dispatcher\DispatcherAssignOrderRequest;
use Illuminate\Support\Facades\DB;
use App\Models\OrderAssignment;
use App\Models\User;
use App\Models\Order;

class DispatcherAssignOrdersController extends Controller
{
    public function __invoke(DispatcherAssignOrderRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {
            $assignments = [];
            $userId = $data['user_id']; // получаем user_id
            $orderIds = $data['order_ids']; // получаем массив order_ids

            // Проверяем, что пользователь существует и имеет роль курьера
            $user = User::find($userId);
            if (!$user || !$user->hasRole('courier')) {
                DB::rollBack();
                return $this->response(null, "Пользователь ID $userId не является курьером", 400);
            }

            // Проходим по каждому заказу
            foreach ($orderIds as $orderId) {
                // Проверяем, что заказ существует и не имеет статус доставленного
                $order = Order::find($orderId);
                if (!$order) {
                    DB::rollBack();
                    return $this->response(null, "Заказ ID $orderId не найден", 404);
                }

                // Статусы, при которых нельзя назначить курьера
                $invalidStatuses = [5, 6];

                if (in_array($order->order_status_id, $invalidStatuses)) {
                    DB::rollBack();
                    return $this->response(null, "Нельзя назначить курьера на заказ ID $orderId со статусом {$order->order_status_id}", 400);
                }

                // Проверяем, что заказ не назначен другому курьеру
                $existingAssignment = OrderAssignment::where('order_id', $orderId)
                    ->where('role_id', 3) // роль курьера
                    ->first();

                if ($existingAssignment) {
                    DB::rollBack();
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

            DB::commit();

            return $this->response($assignments, 'Заказы успешно назначены курьеру', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response(null, 'Произошла ошибка при назначении заказов', 500);
        }
    }
}

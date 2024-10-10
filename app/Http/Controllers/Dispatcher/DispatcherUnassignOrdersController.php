<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dispatcher\DispatcherUnassignOrderRequest;
use Illuminate\Support\Facades\DB;
use App\Models\OrderAssignment;

class DispatcherUnassignOrdersController extends Controller
{
    public function __invoke(DispatcherUnassignOrderRequest $request)
    {
        // Валидируем запрос и получаем данные
        $data = $request->validated();
        $orderUserIds = $data['order_user_ids'];

        DB::beginTransaction();

        try {
            foreach ($orderUserIds as $item) {
                $userId = $item['user_id']; // Получаем user_id
                $orderId = $item['order_id']; // Получаем order_id

                // Ищем назначение
                $assignment = OrderAssignment::where('order_id', $orderId)
                    ->where('user_id', $userId)
                    ->where('role_id', 3) // Айди роли курьера
                    ->first();

                if (!$assignment) {
                    DB::rollBack();
                    return $this->response(null, "Назначение заказа ID $orderId на курьера ID $userId не найдено", 400);
                }

                // Удаляем назначение
                $assignment->delete();
            }

            // Фиксируем изменения в базе данных
            DB::commit();

            return $this->response(null, 'Заказы успешно сняты с курьера', 200);
        } catch (\Exception $e) {
            // В случае ошибки откатываем транзакцию
            DB::rollBack();
            return $this->response(null, 'Произошла ошибка при снятии заказов с курьера', 500);
        }
    }
}

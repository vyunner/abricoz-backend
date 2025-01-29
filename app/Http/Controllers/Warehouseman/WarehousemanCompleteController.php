<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouseman\WarehousemanCompleteRequest;
use App\Models\Order;
use App\Models\OrderAssignment;
use App\Models\User;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;

class WarehousemanCompleteController extends Controller
{
    protected FirebaseNotificationService $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }

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

        $courier_id = OrderAssignment::where('order_id', $orderId)
            ->where('role_id', 3)
            ->value('user_id');


        $userDevices = UserDevice::where('user_id', $courier_id)
            ->where('fcm_token_type_id', 2)
            ->get();

        foreach ($userDevices as $device) {
            $this->firebaseNotificationService->sendNotification(
                'app2',
                $device->fcm_token,
                [
                    'title' => 'Уведомление курьеру',
                    'body' => 'Складмен собрал заказ',
                    'data' => [
                        'order_id' => (string)$orderId,
                        'order_status_id' => '3',
                    ],
                ]
            );
        }

        return $this->response([], 'Заказ успешно завершен.');
    }
}

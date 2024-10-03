<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\CourierCompleteRequest;
use App\Models\Order;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;

class CourierCompleteController extends Controller
{
    protected FirebaseNotificationService $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }

    /**
     * Завершение заказа курьером
     * @param CourierCompleteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CourierCompleteRequest $request)
    {
        $courierId = $request->user()->id;
        $orderId = $request->order_id;

        // Проверяем, что заказ закреплен за текущим пользователем с role_id = 3
        $orderAssigned = Order::where('id', $orderId)
            ->whereHas('assignments', function ($query) use ($courierId) {
                $query->where('user_id', $courierId)
                    ->where('role_id', 3);
            })
            ->first();

        if (!$orderAssigned) {
            return $this->response([], 'Этот заказ не закреплен за вами.', 400);
        }

        // Проверяем статус заказа
        if ($orderAssigned->order_status_id != 4) {
            return $this->response([], 'Этот заказ не может быть завершен. Некорректный статус заказа.', 400);
        }

        // Обновляем статус заказа на "Доставлен" (order_status_id = 5)
        $orderAssigned->update([
            'order_status_id' => 5,
        ]);

        // Получаем заказчика (user_id)
        $customerId = $orderAssigned->user_id;

        // Получаем устройства заказчика с FCM токенами
        $userDevices = UserDevice::where('user_id', $customerId)
            ->whereNotNull('fcm_token')
            ->get();

        foreach ($userDevices as $device) {
            // Отправляем уведомление на каждый FCM токен
            $this->firebaseNotificationService->sendNotification(
                'app1', // Идентификатор приложения ('app1' или 'app2')
                $device->fcm_token, // Токен устройства
                [
                    'title' => 'Доставка',
                    'body' => 'Курьер отправился к вам!',
                    'data' => [
                        'order_id' => (string)$orderId,
                    ],
                ]
            );
        }

        return $this->response([], 'Заказ успешно завершен.');
    }
}

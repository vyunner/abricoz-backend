<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouseman\WarehousemanCompleteRequest;
use App\Models\Order;
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

        // ИЗМЕНЕНИЕ ЗДЕСЬ: выбираем курьеров вместо складских работников
        $couriers = User::role('courier')->get();

        foreach ($couriers as $courier) {
            // Получаем устройства пользователя с FCM токенами
            $userDevices = UserDevice::where('user_id', $courier->id)
                ->whereNotNull('staff_fcm_token')
                ->get();

            foreach ($userDevices as $device) {
                if (!empty($device->staff_fcm_token)) {
                    // Логируем токен, чтобы увидеть сколько раз на одно и то же устройство отправляется уведомление
                    \Log::info('Sending notification to staff_fcm_token: ' . $device->staff_fcm_token . ' for device_id: ' . $device->device_id);

                    try {
                        $this->firebaseNotificationService->sendNotification(
                            'app2',
                            $device->staff_fcm_token,
                            [
                                'title' => 'Уведомление курьеру',
                                'body' => 'Заберите заказ!',
                                'data' => [
                                    'order_id' => (string)$orderId,
                                    'order_status_id' => '3',
                                ],
                            ]
                        );
                    } catch (\Exception $e) {
                        \Log::error('Ошибка при отправке уведомления на токен ' . $device->staff_fcm_token . ': ' . $e->getMessage());
                    }
                }
            }
        }

        return $this->response([], 'Заказ успешно завершен.');
    }
}

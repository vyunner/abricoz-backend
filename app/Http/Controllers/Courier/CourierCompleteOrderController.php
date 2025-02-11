<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\CourierCompleteOrderRequest;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

/**
 * @group Courier
 */
class CourierCompleteOrderController extends Controller
{
    protected FirebaseNotificationService $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }


    /**
     * Завершение заказа курьером
     * @param CourierCompleteOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CourierCompleteOrderRequest $request)
    {
        $courier = Auth::user();
        $orderId = $request->validated()['order_id'];

        // Проверяем, что заказ назначен этому курьеру
        $order = Order::where('id', $orderId)
            ->whereHas('assignments', function ($query) use ($courier) {
                $query->where('user_id', $courier->id)
                    ->where('role_id', 3);
            })
            ->first();

        if (!$order) {
            return $this->response(null, 'Заказ не найден или не назначен этому курьеру', 404);
        }

        // Проверяем статус заказа
        if (!in_array($order->order_status_id, [4])) {
            return $this->response(null, 'Статус заказа не позволяет его завершить', 400);
        }

        // Меняем статус заказа на 5
        $order->order_status_id = 5;
        $order->save();

        $userDevices = UserDevice::where('user_id', $order->user_id)
            ->where('fcm_token_type_id', 1)
            ->get();

        foreach ($userDevices as $device) {
            // Отправляем уведомление на каждый FCM токен

            try {
                $this->firebaseNotificationService->sendNotification(
                    'app1', // Идентификатор приложения ('app1' или 'app2')
                    $device->fcm_token, // Токен устройства
                    [
                        'title' => 'Abricoz',
                        'body' => 'Ваш заказ был доставлен',
                        'data' => [
                            'order_id' => (string)$order->id,
                        ],
                    ]
                );
            } catch (\Exception $e) {
                // Логируем ошибку и продолжаем выполнение цикла
                Log::error("Ошибка отправки уведомления для пользователя {$warehouseman->id} (токен: {$device->fcm_token}): " . $e->getMessage());
            }
        }

        return $this->response(null, 'Заказ успешно завершен', 200);
    }
}

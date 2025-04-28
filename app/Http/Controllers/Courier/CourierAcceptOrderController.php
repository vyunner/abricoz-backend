<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Courier\CourierCompleteOrderRequest;
use App\Models\OrderAssignment;
use App\Models\User;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

/**
 * @group Courier
 */
class CourierAcceptOrderController extends Controller
{
    protected FirebaseNotificationService $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }

    /**
     * Принятие заказа курьером
     * @param CourierCompleteOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function __invoke(CourierCompleteOrderRequest $request)
    {
        $courier = $request->user();
        $orderId = $request->validated()['order_id'];

        // Проверяем, что заказ назначен этому курьеру
        $order = Order::where('id', $orderId)->first();
//            ->whereHas('assignments', function ($query) use ($courier) {
//                $query->where('user_id', $courier->id)
//                    ->where('role_id', 3);
//            })
//            ->first();

        if (!$order) {
            return $this->response(null, 'Заказ не найден или не назначен этому курьеру', 404);
        }

        // Проверяем статус заказа
        if (!in_array($order->order_status_id, [3])) {
            return $this->response(null, 'Статус заказа не позволяет его взять', 400);
        }

        $orderAssignment = OrderAssignment::create([
            'order_id' => $orderId,
            'user_id' => $courier->id,
            'role_id' => 3
        ]);

        // Меняем статус заказа на 4
        $order->order_status_id = 4;
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
                        'body' => 'Курьер забрал заказ и направляется к вам',
                        'data' => [
                            'order_id' => (string)$order->id,
                            'order_status_id' => (string)$order->order_status_id,
                        ],
                    ]
                );
            } catch (\Exception $e) {
                // Логируем ошибку и продолжаем выполнение цикла
                Log::error("Ошибка отправки уведомления для пользователя {$warehouseman->id} (токен: {$device->fcm_token}): " . $e->getMessage());
            }
        }


        return $this->response(null, 'Статус изменен', 200);
    }
}

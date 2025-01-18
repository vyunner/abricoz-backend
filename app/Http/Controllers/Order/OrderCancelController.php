<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Order
 */
class OrderCancelController extends Controller
{
    public function __construct(
        protected FirebaseNotificationService $firebaseNotificationService
    )
    {
    }

    /**
     * Отмена заказа
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, int $id)
    {
        $user = $request->user();
        $order = Order::findOrFail($id);

        if ($user->hasRole('admin') || $order->user_id === $user->id) {
            $order->update(['order_status_id' => OrderStatus::CANCELLED]);

            $userDevices = UserDevice::where('user_id', $user->id)
                ->whereNotNull('fcm_token')
                ->get();

            foreach ($userDevices as $device) {
                if (!empty($device->fcm_token)) {
                    // Логируем токен, чтобы увидеть сколько раз на одно и то же устройство отправляется уведомление
                    \Log::info('Sending notification to staff_fcm_token: ' . $device->fcm_token . ' for device_id: ' . $device->device_id);

                    try {
                        $this->firebaseNotificationService->sendNotification(
                            'app1',
                            $device->staff_fcm_token,
                            [
                                'title' => 'Уведомление курьеру',
                                'body' => 'Заберите заказ!',
                                'data' => [
                                    'order_id' => (string) $order->id,
                                    'order_status_id' => (string) OrderStatus::WAITING_FOR_COURIER,
                                ],
                            ]
                        );
                    } catch (\Exception $e) {
                        \Log::error('Ошибка при отправке уведомления на токен ' . $device->staff_fcm_token . ': ' . $e->getMessage());
                    }
                }
            }

            return $this->response($order, 'Заказ успешно отменен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', Response::HTTP_FORBIDDEN);
    }
}

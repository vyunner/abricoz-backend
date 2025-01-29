<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;

/**
 * @group HeadWarehouse
 */
class HeadWarehouseDeleteOrderController extends Controller
{
    protected FirebaseNotificationService $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }

    /**
     * Отмена заказа зав складом или админом
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function __invoke(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update(['order_status_id' => OrderStatus::CANCELLED]);

        $userDevices = UserDevice::where('user_id', $order->user_id)
            ->where('fcm_token_type_id', 1)
            ->get();

        foreach ($userDevices as $device) {
            $this->firebaseNotificationService->sendNotification(
                'app1',
                $device->fcm_token,
                [
                    'title' => 'Abricoz',
                    'body' => 'Ваш заказ был отменен сотрудником склада',
                    'data' => [
                        'order_id' => (string)$order->id,
                    ],
                ]
            );
        }

        return $this->response($order, __('response.order.success.cancel'));
    }
}

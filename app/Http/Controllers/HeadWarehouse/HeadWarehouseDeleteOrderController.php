<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        // Обновляем статус заказа на "Отменён"
        $order->update(['order_status_id' => OrderStatus::CANCELLED]);

        // Возвращаем товары на склад
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();

        foreach ($orderProducts as $orderProduct) {
            $product = Product::find($orderProduct->product_id);

            if ($product) {
                $product->amount += $orderProduct->product_quantity;
                $product->stock_quantity += $orderProduct->product_quantity;
                $product->total_sales = max(0, $product->total_sales - $orderProduct->product_quantity);
                $product->save();
            }
        }

        // Отправка FCM-уведомлений пользователю
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

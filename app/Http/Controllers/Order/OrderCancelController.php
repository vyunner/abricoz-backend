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

        if ($order->user_id === $user->id && $order->order_status_id == 1) {
            $order->update(['order_status_id' => OrderStatus::CANCELLED]);

            return $this->response($order, __('response.order.success.cancel'));
        }

        return $this->response(null, __('response.order.error.forbidden'), Response::HTTP_FORBIDDEN);
    }
}

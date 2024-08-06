<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderCancelController extends Controller
{
    /**
     * Отмена заказа
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user = $request->user();
        $order = Order::findOrFail($id);

        if ($user->hasRole('admin') || $order->user_id == $user->id) {
            $order->update(['order_status_id' => 4]);
            return $this->response($order, 'Заказ успешно отменен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', 403);
    }
}

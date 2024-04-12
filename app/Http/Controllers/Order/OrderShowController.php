<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderShowController extends Controller
{
    /**
     * Элемент
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $order = OrderResource::make(Order::with(['orderStatus', 'deliveryInterval', 'products'])->findOrFail($id));

        if ($request->user()->hasRole('admin') || $order->user_id == $user_id) {
            return $this->response($order, 'Заказ успешно отображен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', 403);
    }
}

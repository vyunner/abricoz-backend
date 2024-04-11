<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id, OrderService $orderService)
    {
        $user_id = $request->user()->id;
        $order = $orderService->transformOrder(Order::with(['orderStatus', 'deliveryInterval', 'products'])->findOrFail($id));

        if ($request->user()->hasRole('admin') || $order->user_id == $user_id) {
            return $this->response($order, 'Заказ успешно отображен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', 403);
    }
}

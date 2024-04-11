<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->has('perPage')){
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $orders = Order::with(['orderStatus', 'deliveryInterval'])->paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $orders->currentPage(),
                'orders' => $orders->items()->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'user_id' => $order->user_id,
                        'order_status' => $order->orderStatus->name,
                        'delivery_interval' => $order->deliveryInterval->name,
                        'address' => $order->address,
                        'address_comment' => $order->address_comment,
                        'order_comment' => $order->order_comment,
                        'delivery_date' => $order->delivery_date,
                    ];
                }),
                'total' => $orders->total(),
            ], 'Список заказов успешно загружен!');
        }

        $orders = Order::with(['orderStatus', 'deliveryInterval'])->get();
        return $this->response($orders->map(function ($order) {
            return [
                'id' => $order->id,
                'user_id' => $order->user_id,
                'order_status' => $order->orderStatus->name,
                'delivery_interval' => $order->deliveryInterval->name,
                'address' => $order->address,
                'address_comment' => $order->address_comment,
                'order_comment' => $order->order_comment,
                'delivery_date' => $order->delivery_date,
            ];
        }), 'Список заказов успешно загружен!');
    }
}

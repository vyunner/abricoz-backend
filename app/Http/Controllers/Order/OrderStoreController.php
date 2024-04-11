<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderStoreController extends Controller
{
    public function __invoke(OrderStoreRequest $request, OrderService $orderService)
    {
        $user_id = $request->user()->id;

        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;

        $order = Order::create($validatedData);

        $cartItems = Cart::where('user_id', $user_id)->get();

        $orderProducts = $cartItems->map(function ($cartItem) use ($order) {
            return [
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_quantity' => $cartItem->product_quantity,
            ];
        })->toArray();

        OrderProduct::insert($orderProducts);

        Cart::where('user_id', $user_id)->delete();

        $order = $order->load(['products', 'orderStatus', 'deliveryInterval']);
        $order = $orderService->transformOrder($order);

        return $this->response($order, 'Заказ успешно создан!');
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderStoreController extends Controller
{
    /**
     * Создание
     * @param OrderStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderStoreRequest $request)
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
        $order = OrderResource::make($order);

        return $this->response($order, 'Заказ успешно создан!');
    }
}

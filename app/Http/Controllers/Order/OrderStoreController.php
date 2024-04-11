<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(OrderStoreRequest $request)
    {
        $user_id = $request->user()->id;

        $cartItems = Cart::where('user_id', $user_id)->get();

        $validatedData = $request->validated();
        $order = Order::create($validatedData);

        foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_quantity' => $cartItem->product_quantity,
            ]);
        }

        Cart::where('user_id', $user_id)->delete();

        return $this->response([
            'order' => $order,
            'order_products' => $order->products()->get()
        ], 'Заказ успешно создан!');
    }
}

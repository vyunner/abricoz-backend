<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Cart;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderProduct;

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

        $order = Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($order && $order->order_status_id == 1){
            return $this->response([], 'Оплатите предыдущий заказ!');
        }

        $inactiveProducts = Cart::where('user_id', $user_id)
            ->whereHas('product', function ($query) {
                $query->where('is_active', 0);
            })
            ->get();

        if ($inactiveProducts->isNotEmpty()) {
            $inactiveProductNames = $inactiveProducts->pluck('product.name')->toArray();
            Cart::whereIn('id', $inactiveProducts->pluck('id'))->delete();

            return $this->response([
                'inactive_products' => $inactiveProductNames
            ], 'Некоторые продукты в вашей корзине были неактивны и удалены. Пожалуйста, пересмотрите ваш заказ.');
        }

        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;
        $validatedData['order_status_id'] = 1;

        $order = Order::create($validatedData);

        $cartItems = Cart::where('user_id', $user_id)
            ->with('product')
            ->get();

        $orderProducts = $cartItems->map(function ($cartItem) use ($order) {
            return [
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_quantity' => $cartItem->product_quantity,
                'product_price' => $cartItem->product->price,
                'product_discount' => $cartItem->product->discount,
                'product_price_with_discount' => $cartItem->product->price_with_discount
            ];
        })->toArray();

        $productsPrice = collect($orderProducts)->sum(function ($item) {
            return $item['product_price_with_discount'] * $item['product_quantity'];
        });

        OrderProduct::insert($orderProducts);

        Cart::where('user_id', $user_id)->delete();

        $delivery_price = District::where(['id' => $order['district_id']])->first()->delivery_price;

        $order->update(['products_price' => $productsPrice]);
        $order->update(['delivery_price' => $delivery_price]);
        $order->update(['total_price' => $productsPrice + $delivery_price]);

        $order = $order->load(['orderStatus', 'deliveryInterval', 'products', 'paymentType']);

        return $this->response($order, 'Заказ успешно создан!');
    }
}

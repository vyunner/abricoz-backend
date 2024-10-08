<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DispatcherGetUnassignedOrdersController extends Controller
{
    public function __invoke()
    {
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
            ->whereDoesntHave('assignments', function ($query) {
                $query->where('role_id', 3); // Айди роли курьера
            })
            ->with([
                'user:id,phone',
                'city:id,name',
                'deliveryInterval:id,name',
                'orderStatus:id,name',
                'products' => function ($query) {
                    $query->select('products.id', 'name_ru', 'weight')
                        ->withPivot('product_quantity');
                }
            ])
            ->get();

        // Формируем массив заказов с необходимыми полями
        $ordersArray = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'phone' => $order->user->phone,
                'city_name' => $order->city->name,
                'address_street_and_house' => $order->address_street_and_house,
                'address_apartment' => $order->address_apartment,
                'address_entrance' => $order->address_entrance,
                'address_floor' => $order->address_floor,
                'address_comment' => $order->address_comment,
                'delivery_date' => $order->delivery_date,
                'delivery_interval_name' => $order->deliveryInterval->name,
                'order_status_id' => $order->order_status_id,
                'order_status_name' => $order->orderStatus->name,
                'products' => $order->products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name_ru' => $product->name_ru,
                        'product_quantity' => $product->pivot->product_quantity,
                        'weight' => $product->weight,
                    ];
                }),
            ];
        });

        return $this->response($ordersArray, 'Неназначенные заказы получены', 200);
    }
}

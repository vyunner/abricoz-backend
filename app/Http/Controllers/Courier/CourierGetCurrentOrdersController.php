<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CourierGetCurrentOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        $courier = Auth::user();

        // Получаем заказы, назначенные этому курьеру, со статусами 1, 2, 3, 4
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
            ->whereHas('assignments', function ($query) use ($courier) {
                $query->where('user_id', $courier->id)
                    ->where('role_id', 3); // Айди роли курьера
            })
            ->with([
                'user:id,firstname,lastname,phone',
                'deliveryInterval:id,name',
                'city:id,name',
                'orderStatus:id,name',
                'products' => function ($query) {
                    $query->select('products.id', 'name_ru', 'weight')
                        ->withPivot('product_quantity');
                }
            ])
            ->get();

        if ($orders->isEmpty()) {
            return $this->response(null, 'Текущих заказов нет', 404);
        }

        // Формируем массив заказов с необходимыми полями
        $ordersArray = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'order_status_id' => $order->order_status_id,
                'User' => [
                    'phone' => $order->user->phone,
                    'firstname' => $order->user->firstname,
                    'lastname' => $order->user->lastname,
                ],
                'DeliveryInterval' => [
                    'name' => $order->deliveryInterval->name,
                ],
                'City' => [
                    'name' => $order->city->name,
                ],
                'address_street_and_house' => $order->address_street_and_house,
                'address_apartment' => $order->address_apartment,
                'address_entrance' => $order->address_entrance,
                'address_floor' => $order->address_floor,
                'address_comment' => $order->address_comment,
                'delivery_date' => $order->delivery_date,
                'OrderStatus' => [
                    'name' => $order->orderStatus->name,
                ],
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

        return $this->response($ordersArray, 'Текущие заказы получены', 200);
    }
}

<?php

namespace App\Http\Controllers\Courier;

use Carbon\Carbon;
use App\Models\DeliveryInterval;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Http\Controllers\Controller;

class CourierGetCurrentOrdersController extends Controller
{
    public function __invoke()
    {
        $courier = Auth::user();

        if (!$courier->hasRole('courier')) {
            return $this->response(null, 'Доступ запрещен', 403);
        }

        // Получаем интервалы доставки в нужном порядке (из БД)
        $intervalNamesInOrder = DeliveryInterval::orderBy('id')->pluck('name')->toArray();

        // Получаем заказы курьера со всеми нужными связями
        $orders = Order::whereIn('order_status_id', [1, 2, 3, 4])
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

        // Преобразуем каждый заказ в нужный формат
        $formattedOrders = $orders->map(function ($order) {
            return [
                'id' => $order->id,
                'order_status_id' => $order->order_status_id,
                'payment_type_id' => $order->payment_type_id,
                'total_price' => $order->total_price,
                'phone' => $order->user->phone,
                'firstname' => $order->user->firstname,
                'lastname' => $order->user->lastname,
                'delivery_interval_name' => $order->deliveryInterval->name,
                'city_name' => $order->city->name,
                'address_street_and_house' => $order->address_street_and_house,
                'address_apartment' => $order->address_apartment,
                'address_entrance' => $order->address_entrance,
                'address_floor' => $order->address_floor,
                'address_comment' => $order->address_comment,
                '2gis_url' => "https://2gis.ru/geo/{$order->longitude},{$order->latitude}",
                'delivery_date' => Carbon::parse($order->delivery_date)->format('d.m.Y'),
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

        // Сортируем сначала по delivery_date, потом по delivery_interval_name
        $sortedOrders = $formattedOrders->sort(function ($a, $b) use ($intervalNamesInOrder) {
            $dateA = strtotime(str_replace('.', '-', $a['delivery_date']));
            $dateB = strtotime(str_replace('.', '-', $b['delivery_date']));

            if ($dateA === $dateB) {
                $intervalIndexA = array_search($a['delivery_interval_name'], $intervalNamesInOrder);
                $intervalIndexB = array_search($b['delivery_interval_name'], $intervalNamesInOrder);
                return $intervalIndexA <=> $intervalIndexB;
            }

            return $dateA <=> $dateB;
        })->values();

        return $this->response($sortedOrders, 'Текущие заказы получены', 200);
    }
}

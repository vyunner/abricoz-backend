<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Dispatcher
 */
class DispatcherGetAssignedOrdersController extends Controller
{
    /**
     * Гет закрепленных заказов
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $courierRoleId = 3; // Айди роли курьера

        $couriers = User::whereHas('roles', function ($query) use ($courierRoleId) {
            $query->where('id', $courierRoleId);
        })
            ->with(['orders' => function ($query) {
                $query->whereIn('order_status_id', [1, 2, 3, 4])
                    ->with([
                        'orderStatus:id,name',
                        'city:id,name',
                        'products' => function ($query) {
                            $query->select('products.id', 'name_ru', 'weight')
                                ->withPivot('product_quantity');
                        }
                    ]);
            }])
            ->get(['id', 'firstname', 'lastname', 'phone']);

        // Формируем массив курьеров с заказами
        $couriersArray = $couriers->map(function ($courier) {
            return [
                'id' => $courier->id,
                'firstname' => $courier->firstname,
                'lastname' => $courier->lastname,
                'phone' => $courier->phone,
                'orders' => $courier->orders->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'order_status_id' => $order->order_status_id,
                        'order_status_name' => $order->orderStatus->name,
                        'city_name' => $order->city->name,
                        'address_street_and_house' => $order->address_street_and_house,
                        'address_apartment' => $order->address_apartment,
                        'address_entrance' => $order->address_entrance,
                        'address_floor' => $order->address_floor,
                        'address_comment' => $order->address_comment,
                        'products' => $order->products->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'name_ru' => $product->name_ru,
                                'product_quantity' => $product->pivot->product_quantity,
                                'weight' => $product->weight,
                            ];
                        }),
                    ];
                })->values(),
            ];
        });

        return $this->response($couriersArray, 'Список курьеров с закрепленными заказами получен', 200);
    }
}

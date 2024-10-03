<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Models\OrderAssignment;
use Illuminate\Http\Request;

/**
 * @group Courier
 */
class CourierGetCurrentOrderController extends Controller
{
    /**
     * Отображение текущего закрепленного заказа для курьера
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $userId = $request->user()->id;

        // Находим закрепленный за текущим пользователем заказ с role_id = 3 и статусом заказа = 4
        $assignment = OrderAssignment::where('user_id', $userId)
            ->where('role_id', 3)
            ->whereHas('order', function ($query) {
                $query->where('order_status_id', 4); // статус 'В пути'
            })
            ->first();

        if (!$assignment) {
            return $this->response([], 'У вас нет текущего закрепленного заказа.', 404);
        }

        $order = $assignment->order->load([
            'orderProducts' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'product_quantity');
            },
            'orderProducts.product' => function ($query) {
                $query->select('id', 'name_ru', 'weight', 'where');
            },
            'deliveryInterval:id,name',
        ]);

        // Формируем полный адрес
        $address = $order->address_street_and_house;
        if ($order->address_apartment) {
            $address .= ', кв. ' . $order->address_apartment;
        }
        if ($order->address_entrance) {
            $address .= ', подъезд ' . $order->address_entrance;
        }
        if ($order->address_floor) {
            $address .= ', этаж ' . $order->address_floor;
        }
        if ($order->address_comment) {
            $address .= ' (' . $order->address_comment . ')';
        }

        // Преобразуем данные продуктов
        $products = $order->orderProducts->map(function ($orderProduct) {
            $product = $orderProduct->product;
            return [
                'name' => $product->name_ru,
                'where' => $product->where,
                'amount' => $orderProduct->product_quantity . ' * ' . $product->weight,
            ];
        })->all();

        // Подготовка данных
        $data = [
            'order_id' => $order->id,
            'delivery_date' => $order->delivery_date,
            'delivery_interval_name' => $order->deliveryInterval->name,
            'address' => $address,
            'products' => $products,
        ];

        return $this->response($data, 'Ваш текущий заказ успешно отображен.');
    }
}

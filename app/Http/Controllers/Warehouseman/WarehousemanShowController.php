<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Models\Order;

/**
 * @group Warehouseman
 */
class WarehousemanShowController extends Controller
{
    /**
     * Отображение информации о заказе
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $order = Order::with([
            'orderProducts' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'product_quantity');
            },
            'orderProducts.product' => function ($query) {
                $query->select('id', 'name_ru', 'weight', 'where', 'subcategory_id', 'photo_url');
            },
            'deliveryInterval:id,name',
            'warehousemanAssignment.user:id,firstname,lastname',
        ])->findOrFail($id, [
            'id',
            'delivery_date',
            'delivery_interval_id',
            'order_status_id',
            'address_street_and_house',
            'address_apartment',
            'address_entrance',
            'address_floor',
            'address_comment',
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
        $products = $order->orderProducts
            ->sortBy(function ($orderProduct) {
                return $orderProduct->product->subcategory_id ?? 0;
            })
            ->map(function ($orderProduct) {
                $product = $orderProduct->product;
                return [
                    'name' => $product->name_ru,
                    'where' => $product->where,
                    'amount' => $orderProduct->product_quantity . ' * ' . $product->weight,
                    'photo_url' => $product->photo_url,
                ];
            })
            ->values()
            ->all();

        // Получаем fullname сотрудника
        $fullname = null;
        if ($order->warehousemanAssignment && $order->warehousemanAssignment->user) {
            $fullname = $order->warehousemanAssignment->user->firstname . ' ' . $order->warehousemanAssignment->user->lastname;
        }

        // Формируем итоговый массив данных
        $data = [
            'fullname' => $fullname,
            'order_id' => $order->id,
            'order_status_id' => $order->order_status_id,
            'delivery_date' => $order->delivery_date,
            'delivery_interval_name' => $order->deliveryInterval->name,
            'address' => $address,
            'products' => $products,
        ];

        return $this->response($data, 'Заказ успешно отображен');
    }
}

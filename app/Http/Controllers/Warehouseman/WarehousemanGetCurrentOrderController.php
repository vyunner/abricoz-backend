<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Models\OrderAssignment;
use Illuminate\Http\Request;

/**
 * @group Warehouseman
 */
class WarehousemanGetCurrentOrderController extends Controller
{
    /**
     * Отображение текущего заказа складским работником
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $userId = $request->user()->id;

        // Find the assignment for the current user with role_id = 2 and order status = 2
        $assignment = OrderAssignment::where('user_id', $userId)
            ->where('role_id', 2)
            ->whereHas('order', function ($query) {
                $query->where('order_status_id', 2); // status 'collecting'
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
                $query->select('id', 'name_ru', 'weight', 'where', 'photo_url');
            },
            'deliveryInterval:id,name',
        ]);

        // Form the full address
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

        // Transform the products data
        $products = $order->orderProducts->map(function ($orderProduct) {
            $product = $orderProduct->product;
            return [
                'name' => $product->name_ru,
                'where' => $product->where,
                'amount' => $orderProduct->product_quantity . ' * ' . $product->weight,
                'photo_url' => $product->photo_url, // добавили photo_url
            ];
        })->all();

        // Prepare the data
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

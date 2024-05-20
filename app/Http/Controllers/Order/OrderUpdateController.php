<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderUpdateController extends Controller
{
    /**
     * Обновление
     * @param OrderUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $order = Order::findOrFail($id);

        $order->fill($validatedData)->save();
        $order->load(['orderStatus', 'deliveryInterval', 'products']);

        if (isset($validatedData['order_status_id']) && $validatedData['order_status_id'] == 3) {
            $orderProducts = $order->products;

            foreach ($orderProducts as $orderProduct) {
                $productQuantity = $orderProduct->pivot->product_quantity;

                $product = $orderProduct;

                $product->total_sales += $productQuantity;
                $product->save();
            }
        }

        return $this->response($order, 'Данные заказа успешно изменены!');
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
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
     * @param OrderService $orderService
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderUpdateRequest $request, $id, OrderService $orderService)
    {
        $validatedData = $request->validated();
        $order = Order::findOrFail($id);

        $order->fill($validatedData)->save();
        $order->load(['products', 'orderStatus', 'deliveryInterval']);

        $order = OrderResource::make($order);

        return $this->response($order, 'Данные заказа успешно изменены!');
    }
}

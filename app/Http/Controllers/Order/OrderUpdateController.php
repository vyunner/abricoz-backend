<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(OrderUpdateRequest $request, $id, OrderService $orderService)
    {
        $validatedData = $request->validated();
        $order = Order::findOrFail($id);

        $order->fill($validatedData)->save();
        $order->load(['products', 'orderStatus', 'deliveryInterval']);

        $order = $orderService->transformOrder($order);

        return $this->response($order, 'Данные заказа успешно изменены!');
    }
}

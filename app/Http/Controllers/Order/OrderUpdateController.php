<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(OrderUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $order = Order::findOrFail($id);

        $order->update($validatedData);

        return $this->response([], 'Данные заказа успешно изменены!');
    }
}

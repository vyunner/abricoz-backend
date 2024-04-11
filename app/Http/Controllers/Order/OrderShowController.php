<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $order = Order::find($id);

        if ($request->user()->hasRole('admin')) {
            return $this->response($order, 'Заказ успешно отображен!');
        } elseif ($order->user_id == $user_id) {
            return $this->response($order, 'Заказ успешно отображен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', 403);
    }
}

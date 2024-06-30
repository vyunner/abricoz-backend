<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderShowRequest;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderLastStatusController extends Controller
{
    /**
     * Проверка на оплату последнего заказа
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $user_id = $request->user()->id;

        $order = Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($order && $order->order_status_id == 1){
            return false;
        }

        return true;
    }
}

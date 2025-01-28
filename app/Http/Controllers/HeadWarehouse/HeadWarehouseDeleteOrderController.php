<?php

namespace App\Http\Controllers\HeadWarehouse;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;


class HeadWarehouseDeleteOrderController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update(['order_status_id' => OrderStatus::CANCELLED]);

        return $this->response($order, __('response.order.success.cancel'));
    }
}

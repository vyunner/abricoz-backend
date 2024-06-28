<?php

namespace App\Http\Controllers\Robokassa;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\RobokassaJson;
use Illuminate\Http\Request;


/**
 * @group Robokassa
 */
class RobokassaResultController extends Controller
{
    /**
     * Result
     * @param Request $request
     * @return Request
     */
    public function __invoke(Request $request)
    {
        $data = $request->all();
        RobokassaJson::create(['data' => $data]);

        $order = Order::find($data['InvId']);
        $order->order_status_id = 2;
        $order->save();

        return 'OK' . $data['inv_id'];
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderShowRequest;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderShowController extends Controller
{
    /**
     * Элемент
     * @param OrderShowRequest $request
     * @param $id
     * @return mixed
     */
    public function __invoke(OrderShowRequest $request, $id)
    {
        $user = $request->user();

        $is_last = filter_var($request->query('isLast'), FILTER_VALIDATE_BOOLEAN);

        if ($is_last){
            $order = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();
        }
        else{
            $order = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType'])->findOrFail($id);
        }

        if ($user->hasRole('admin') || $order->user_id == $user->id) {
            return $this->response($order, 'Заказ успешно отображен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', 403);
    }
}

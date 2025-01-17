<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderShowRequest;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Order
 */
class OrderShowController extends Controller
{
    /**
     * Элемент
     * @param OrderShowRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderShowRequest $request, int $id)
    {
        $user = $request->user();

        $is_last = filter_var($request->query('isLast'), FILTER_VALIDATE_BOOLEAN);

        if ($is_last) {
            $order = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();
        } else {
            $order = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType'])
                ->findOrFail($id);
        }

        if ($user->hasRole('admin') || $order->user_id === $user->id) {
            return $this->response($order, 'Заказ успешно отображен!');
        }

        return $this->response([], 'Вы не имеете доступа к этому заказу!', Response::HTTP_FORBIDDEN);
    }
}

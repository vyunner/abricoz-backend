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

        if (!($user->hasRole('admin') || $order->user_id === $user->id)) {
            return $this->response([], 'Вы не имеете доступа к этому заказу!', Response::HTTP_FORBIDDEN);
        }

        // Преобразуем order в массив и заменим цену товара на цену из order_products
        $orderArray = $order->toArray();
        $orderArray['products'] = $order->products->map(function ($product) {
            $productArray = $product->toArray();
            $productArray['price'] = $product->pivot->product_price_with_discount;
            return $productArray;
        })->toArray();

        return $this->response($orderArray, 'Заказ успешно отображен!');
    }
}

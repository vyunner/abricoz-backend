<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderIndexRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * @group Order
 */
class OrderActiveOrdersController extends Controller
{
    /**
     * Список активных заказов
     * @param OrderIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderIndexRequest $request)
    {
        $user = $request->user();
        $query = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType'])
            ->whereIn('order_status_id', [1, 2, 3, 4]);

        if (!$user || !$user->hasRole('admin')) {
            $query->where('user_id', $user->id);
        } else {
            $query->with('user');
        }

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);
            $orders = $query->paginate($perPage, ['*'], 'page', $page);

            $response = [
                'current_page' => $orders->currentPage(),
                'total' => $orders->total(),
                'total_pages' => $orders->lastPage(),
                'orders' => $orders->items(),
            ];
        } else {
            $response = $query->get();
        }

        return $this->response($response, 'Список активных заказов успешно загружен!');
    }
}

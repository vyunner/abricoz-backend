<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderIndexRequest;
use App\Models\Order;

/**
 * @group Order
 */
class OrderIndexController extends Controller
{
    /**
     * Список
     * @param OrderIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderIndexRequest $request)
    {
        $user = $request->user();
        $query = Order::with(['orderStatus', 'deliveryInterval', 'products', 'paymentType']);

        if (!$user || !$user->hasRole('admin')) {
            $query->where('user_id', $user->id);
        } else {
            $query->with('user');
        }

        $query->orderBy('created_at', 'desc');

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

        return $this->response($response, 'Список заказов успешно загружен!');
    }
}

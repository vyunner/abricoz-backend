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
        $query = Order::with(['orderStatus', 'deliveryInterval', 'products']);

        if (!$user->hasRole('admin')) {
            $query->where('user_id', $user->id);
        }

        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);
            $orders = $query->paginate($perPage, ['*'], 'page', $page);

            $response = [
                'current_page' => $orders->currentPage(),
                'orders' => $orders->map(function ($order) {
                    return OrderResource::make($order);
                }),
                'total' => $orders->total(),
            ];
        } else {
            $orders = $query->get();
            $response = $orders->map(function ($order) {
                return OrderResource::make($order);
            });
        }

        return $this->response($response, 'Список заказов успешно загружен!');
    }
}

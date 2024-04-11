<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderIndexController extends Controller
{
    public function __invoke(Request $request, OrderService $orderService)
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
                'orders' => $orders->map(function ($order) use ($orderService) {
                    return $orderService->transformOrder($order);
                }),
                'total' => $orders->total(),
            ];
        } else {
            $orders = $query->get();
            $response = $orders->map(function ($order) use ($orderService) {
                return $orderService->transformOrder($order);
            });
        }

        return $this->response($response, 'Список заказов успешно загружен!');
    }
}

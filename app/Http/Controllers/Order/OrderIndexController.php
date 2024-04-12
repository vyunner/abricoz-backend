<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderIndexController extends Controller
{
    public function __invoke(Request $request)
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

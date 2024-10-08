<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DispatcherGetCouriersController extends Controller
{
    public function __invoke(Request $request)
    {
        $courierRoleId = 3; // Айди роли курьера

        // Получаем всех курьеров
        $couriers = User::whereHas('roles', function ($query) use ($courierRoleId) {
            $query->where('id', $courierRoleId);
        })
            ->withCount(['assignments as orders_count' => function ($query) {
                $query->whereHas('order', function ($query) {
                    $query->whereIn('order_status_id', [1, 2, 3, 4]);
                });
            }])
            ->get();

        return response()->json($couriers);
    }
}

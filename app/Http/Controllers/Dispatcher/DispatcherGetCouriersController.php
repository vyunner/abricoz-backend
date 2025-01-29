<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


/**
 * @group Dispatcher
 */
class DispatcherGetCouriersController extends Controller
{
    /**
     * Список курьеров
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $courierRoleId = 3; // Айди роли курьера

        $couriers = User::whereHas('roles', function ($query) use ($courierRoleId) {
            $query->where('id', $courierRoleId);
        })
            ->withCount(['assignments as orders_count' => function ($query) {
                $query->whereHas('order', function ($query) {
                    $query->whereIn('order_status_id', [1, 2, 3, 4]);
                })
                    ->where('role_id', 3); // Айди роли курьера
            }])
            ->get(['id', 'firstname', 'lastname', 'phone']);

        // Формируем массив курьеров с необходимыми полями
        $couriersArray = $couriers->map(function ($courier) {
            return [
                'id' => $courier->id,
                'firstname' => $courier->firstname,
                'lastname' => $courier->lastname,
                'phone' => $courier->phone,
                'orders_count' => $courier->orders_count,
            ];
        });

        return $this->response($couriersArray, 'Список курьеров получен', 200);
    }
}

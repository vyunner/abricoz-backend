<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderAssignment;

class DispatcherAssignOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'courier_id' => 'required|exists:users,id',
        ]);

        // Создаем назначение заказа курьеру
        $assignment = OrderAssignment::create([
            'order_id' => $validated['order_id'],
            'user_id' => $validated['courier_id'],
            'role_id' => 3, // Айди роли курьера
        ]);

        return response()->json(['message' => 'Заказ успешно назначен курьеру', 'assignment' => $assignment]);
    }
}

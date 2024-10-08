<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderAssignment;

class DispatcherUnassignOrdersController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'courier_id' => 'required|exists:users,id',
        ]);

        // Удаляем назначение заказа курьеру
        OrderAssignment::where('order_id', $validated['order_id'])
            ->where('user_id', $validated['courier_id'])
            ->where('role_id', 3) // Айди роли курьера
            ->delete();

        return response()->json(['message' => 'Заказ успешно снят с курьера']);
    }
}

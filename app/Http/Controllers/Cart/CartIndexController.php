<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * @group Cart
 */
class CartIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($item) {
                return [
                    'cart_id' => $item->id,
                    'product' => $item->product,
                ];
            });

        return $this->response($cartItems, 'Список корзины успешно загружен!');
    }
}

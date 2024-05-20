<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartDestroyRequest;
use App\Models\Cart;
use Illuminate\Http\Request;


/**
 * @group Cart
 */
class CartDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $cart = Cart::where('product_id', $id)
            ->where('user_id', $user_id)
            ->first();

        if (!$cart) {
            return $this->response([], 'Продукт не найден в корзине!', 404);
        }

        $cart->delete();
        return $this->response([], 'Продукт успешно удален из корзины!');
    }
}

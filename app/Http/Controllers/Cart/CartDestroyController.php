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
        $cart = Cart::findOrFail($id);

        if ($user_id == $cart['user_id']) {
            $cart->delete();
            return $this->response([], 'Продукт успешно удален из корзины!');
        }

        return $this->response([], 'Нельзя удалить продукт из чужой корзины!', 403);
    }
}

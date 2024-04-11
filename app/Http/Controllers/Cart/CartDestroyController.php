<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartDestroyRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $user = $request->user();
        $cart = Cart::findOrFail($id);

        if ($user->id == $cart['user_id']){
            $cart->delete();
            return $this->response([], 'Продукт успешно удален из корзины!');
        }

        return $this->response([], 'Нельзя удалить продукт из чужой корзины!', 403);
    }
}

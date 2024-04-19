<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * @group Cart
 */
class CartStoreController extends Controller
{
    /**
     * Создание
     * @param CartStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CartStoreRequest $request)
    {
        $user_id = $request->user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;

        $cart = Cart::create($validatedData);
        $cart->load('product');

        return $this->response($cart, 'Продукт успешно добавлен в корзину!');
    }
}

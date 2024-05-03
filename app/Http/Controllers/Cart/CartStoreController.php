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

        $cart = Cart::firstOrCreate([
            'user_id' => $user_id,
            'product_id' => $validatedData['product_id']
        ], $validatedData);

        $cart->load('product');

        $message = $cart->wasRecentlyCreated ? 'Продукт успешно добавлен в корзину!' : 'Продукт успешно обновлен в корзине!';

        return $this->response($cart, $message);
    }
}

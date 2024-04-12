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
        $validatedData = $request->validated();

        Cart::create($validatedData);

        return $this->response([], 'Продукт успешно добавлен в корзину!');
    }
}

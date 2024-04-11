<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CartStoreRequest $request)
    {
        $validatedData = $request->validated();

        Cart::create($validatedData);

        return $this->response([], 'Продукт успешно добавлен в корзину!');
    }
}

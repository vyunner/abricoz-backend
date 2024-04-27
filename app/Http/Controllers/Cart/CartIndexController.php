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
        $user_id = $request->user()->id;

        $carts = Cart::where(['user_id' => $user_id])->with('product')->get();

        return $this->response($carts, 'Список корзины успешно загружен!');
    }
}

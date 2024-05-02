<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;


/**
 * @group Cart
 */
class CartDestroyItemsController extends Controller
{
    /**
     * Удаление всей корзины
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;

        Cart::where('user_id', $user_id)->delete();

        return $this->response([], 'Все продукты успешно удалены из корзины!', 403);
    }
}

<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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

        $similarProducts = collect(); // Using a collection to manage products

        if (!$carts->isEmpty()) {
            foreach ($carts as $cart) {
                if ($similarProducts->count() >= 15) {
                    break;
                }

                $remaining = 15 - $similarProducts->count();

                $similar = Product::where('subcategory_id', $cart->product->subcategory_id)
                    ->where('id', '!=', $cart->product_id)
                    ->whereNotIn('id', $similarProducts->pluck('id'))
                    ->with(['subcategory', 'brand', 'country'])
                    ->take($remaining)
                    ->get();

                $similarProducts = $similarProducts->merge($similar);
            }
        }

        $similarProducts = $similarProducts->take(15);

        return $this->response(['carts' => $carts, 'similarProducts' => $similarProducts], 'Список корзины успешно загружен!');
    }
}

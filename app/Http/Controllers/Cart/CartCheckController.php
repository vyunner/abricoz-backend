<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartCheckRequest;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Cart
 */
class CartCheckController extends Controller
{
    /**
     * Проверка корзины
     * @param CartCheckRequest $request
     * @param $id
     * @return mixed
     */
    public function __invoke(CartCheckRequest $request, $id)
    {
        $validatedData = $request->validated();

        $products = [];
        $totalPrice = 0;

        foreach ($validatedData['products'] as $productData) {
            $product = Product::findOrFail($productData['product_id']);
            $quantity = $productData['product_quantity'];
            $totalProductPrice = $product->price_with_discount * $quantity;

            $products[] = [
                'id' => $product->id,
                'photo_url' => $product->photo_url,
                'name_ru' => $product->name_ru,
                'name_kz' => $product->name_kz,
                'name_en' => $product->name_en,
                'is_active' => $product->is_active,
                'weight' => $product->weight,
                'price' => $product->price,
                'price_with_discount' => $product->price_with_discount,
                'discount' => $product->discount,
            ];

            // Суммируем стоимость всех продуктов
            $totalPrice += $totalProductPrice;
        }

        // Формируем окончательный массив с данными корзины
        $cart = [
            'total_price' => $totalPrice,
            'products' => $products,
        ];

        return $this->response($cart, 'Корзина успешно проверена!');
    }
}

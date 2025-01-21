<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartCheckRequest;
use App\Models\Product;

/**
 * @group Cart
 */
class CartCheckController extends Controller
{
    /**
     * Cart Check
     * @param CartCheckRequest $request
     * @return mixed
     */
    public function __invoke(CartCheckRequest $request)
    {
        $validatedData = $request->validated();

        $products = [];
        $total_price = 0;

        foreach ($validatedData['products'] as $productData) {
            $product = Product::findOrFail($productData['product_id']);

            // Проверка на активность
            if ($product->inactive) {
                $inactivated_products[] = [
                    'id' => $product->id,
                    'is_active' => $product->is_active,
                    'product_quantity' => $productData['product_quantity'],
                    'photo_url' => $product->photo_url,
                    'name_ru' => $product->name_ru,
                    'name_kz' => $product->name_kz,
                    'weight' => $product->weight,
                    'price' => $product->price,
                    'price_with_discount' => $product->price_with_discount,
                    'discount' => $product->discount,
                ];

                continue;
            }

            // Проверка достаточности количества товаров на складе
            if ($product->amount < $productData['product_quantity']) {
                $shortaged_products[] = [
                    'id' => $product->id,
                    'requested_quantity' => $productData['product_quantity'], // Запрашиваемое количество
                    'available_quantity' => $product->amount, // Доступное количество на складе
                    'photo_url' => $product->photo_url,
                    'name_ru' => $product->name_ru,
                    'name_kz' => $product->name_kz,
                    'weight' => $product->weight,
                    'price' => $product->price,
                    'price_with_discount' => $product->price_with_discount,
                    'discount' => $product->discount,
                ];

                // Устанавливаем количество продуктов равное количеству на складе
                $productData['product_quantity'] = $product->amount;
            }

            $total_product_price = $product->price_with_discount * $productData['product_quantity'];

            $products[] = [
                'id' => $product->id,
                'is_active' => $product->is_active,
                'product_quantity' => $productData['product_quantity'],
                'photo_url' => $product->photo_url,
                'name_ru' => $product->name_ru,
                'name_kz' => $product->name_kz,
                'weight' => $product->weight,
                'price' => $product->price,
                'price_with_discount' => $product->price_with_discount,
                'discount' => $product->discount,
            ];

            // Суммируем стоимость всех продуктов
            $total_price += $total_product_price;
        }

        // Формируем окончательный массив с данными корзины
        $cart = [
            'total_price' => $total_price,
            'products' => $products,
            'inactivated_products' => $inactivated_products ?? [],
            'shortaged_products' => $shortaged_products ?? [],
        ];

        return $this->response($cart, 'Корзина успешно проверена!');
    }
}

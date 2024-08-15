<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderProduct;

/**
 * @group Order
 */
class OrderStoreController extends Controller
{
    /**
     * Создание
     * @param OrderStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderStoreRequest $request)
    {
        $validatedData = $request->validated();
        $user_id = $request->user()->id;

        // Начало транзакции для обеспечения атомарности операции
        DB::beginTransaction();

        try {
            // Находим адрес по его ID
            $address = Address::findOrFail($validatedData['address_id']);

            // Создаем заказ с учетом адресных полей
            $order = Order::create([
                'user_id' => $user_id,
                'order_status_id' => 1, // Например, статус "новый"
                'delivery_interval_id' => $validatedData['delivery_interval_id'],
                'payment_type_id' => $validatedData['payment_type_id'],
                'city_id' => $address->city_id,
                'district_id' => $address->district_id,
                'address_street_and_house' => $address->address_street_and_house,
                'address_apartment' => $address->address_apartment,
                'address_entrance' => $address->address_entrance,
                'address_floor' => $address->address_floor,
                'address_comment' => $address->address_comment,
                'delivery_date' => $validatedData['delivery_date'],
                'products_price' => 0, // Будет рассчитано позже
                'delivery_price' => 0, // Можно рассчитать отдельно или фиксировать
                'total_price' => 0, // Будет рассчитано позже
            ]);

            $productsPrice = 0;

            // Проходимся по каждому продукту в заказе
            foreach ($validatedData['products'] as $productData) {
                $product = Product::findOrFail($productData['product_id']);
                $quantity = $productData['product_quantity'] ?? 1;
                $priceWithDiscount = $product->price - ($product->price * ($product->discount / 100));

                // Создаем запись о продукте в заказе
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_quantity' => $quantity,
                    'product_price' => $product->price,
                    'product_discount' => $product->discount,
                    'product_price_with_discount' => $priceWithDiscount,
                ]);

                // Суммируем стоимость продуктов
                $productsPrice += $priceWithDiscount * $quantity;
            }

            // Обновляем цены заказа
            $order->update([
                'products_price' => $productsPrice,
                'delivery_price' => 0, // Здесь можно рассчитать доставку
                'total_price' => $productsPrice, // Например, только сумма продуктов, можно добавить доставку
            ]);

            // Фиксируем транзакцию
            DB::commit();

            return $this->response($order, 'Заказ успешно создан!');

        } catch (\Exception $e) {
            // Откатываем транзакцию в случае ошибки
            DB::rollBack();
            return $this->response(null, 'Ошибка при создании заказа.', 500);
        }
    }
}

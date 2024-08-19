<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\DeliveryInterval;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $current_time = Carbon::now();
        $deliveryInterval = DeliveryInterval::findOrFail($validatedData['delivery_interval_id']);

        $time_range = explode(' - ', $deliveryInterval->name);
        $start_time = Carbon::createFromFormat('H:i', $time_range[0]);
        $end_time = Carbon::createFromFormat('H:i', $time_range[1]);

        // Проверяем, что интервал начинается после текущего времени
        if (!$current_time->lt($start_time)) {
            return $this->response(null, 'Неправильно выбранный временной интервал', 500);
        }

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

                // Создаем запись о продукте в заказе
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_quantity' => $quantity,
                    'product_price' => $product->price,
                    'product_discount' => $product->discount,
                    'product_price_with_discount' => $product->price_with_discount,
                ]);

                // Суммируем стоимость продуктов
                $productsPrice += $product->price_with_discount * $quantity;
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

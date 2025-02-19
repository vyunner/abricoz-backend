<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\DeliveryInterval;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderStoreController extends Controller
{
    public function __invoke(OrderStoreRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();

        $deliveryDate = Carbon::parse($data['delivery_date']);
        $deliveryInterval = DeliveryInterval::find($data['delivery_interval_id']);
        $address = Address::find($data['address_id']);

        if (!$address || $address->user_id !== $user->id) {
            return response()->json(['message' => 'Адрес не найден или не принадлежит пользователю.'], 422);
        }

        // Проверка даты доставки (не раньше сегодняшнего дня)
        if ($deliveryDate->isBefore(Carbon::today())) {
            return response()->json(['message' => 'Дата доставки не может быть раньше сегодняшней.'], 422);
        }

        // Проверка временного интервала, если дата доставки сегодня
        if ($deliveryDate->isToday()) {
            [$start, $end] = explode(' - ', $deliveryInterval->name);
            $currentTime = Carbon::now();

            if ($currentTime->gt(Carbon::createFromFormat('H:i', $start))) {
                return response()->json(['message' => 'Выбранный временной интервал недоступен.'], 422);
            }
        }

        // Проверка количества активных заказов пользователя (не более 3)
        $activeOrdersCount = Order::where('user_id', $user->id)
            ->whereIn('order_status_id', [
                OrderStatus::IN_PROCESS,
                OrderStatus::ASSEMBLING,
                OrderStatus::WAITING_FOR_COURIER,
                OrderStatus::ON_THE_WAY,
            ])->count();

        if ($activeOrdersCount >= 3) {
            return response()->json(['message' => 'Вы не можете иметь более 3 активных заказов.'], 422);
        }

        // Проверка товаров и подсчет общей суммы
        $totalPrice = 0;
        $productsData = [];

        foreach ($data['products'] as $productItem) {
            $product = Product::find($productItem['product_id']);

            if (!$product || !$product->is_active) {
                return response()->json(['message' => "Товар {$product->name_ru} недоступен для продажи."], 422);
            }

            if ($product->amount < $productItem['product_quantity']) {
                return response()->json(['message' => "Недостаточно товара: {$product->name_ru}. Доступно: {$product->amount}"], 422);
            }

            $linePrice = $product->price_with_discount * $productItem['product_quantity'];

            $productsData[] = [
                'product' => $product,
                'quantity' => $productItem['product_quantity'],
                'price' => $product->price,
                'discount' => $product->discount,
                'price_with_discount' => $product->price_with_discount,
                'line_price' => $linePrice,
            ];

            $totalPrice += $linePrice;
        }

        // Проверка минимальной суммы заказа (5000 тенге)
        if ($totalPrice < 5000) {
            return response()->json(['message' => 'Минимальная сумма заказа - 5000 тенге.'], 422);
        }

        DB::beginTransaction();

        try {
            // Создание заказа
            $order = Order::create([
                'user_id' => $user->id,
                'order_status_id' => OrderStatus::IN_PROCESS,
                'delivery_interval_id' => $data['delivery_interval_id'],
                'payment_type_id' => $data['payment_type_id'],
                'city_id' => $address->city_id,
                'address_street_and_house' => $address->address_street_and_house,
                'address_apartment' => $address->address_apartment,
                'address_entrance' => $address->address_entrance,
                'address_floor' => $address->address_floor,
                'address_comment' => $address->address_comment,
                'longitude' => $address->longitude,
                'latitude' => $address->latitude,
                'delivery_date' => $deliveryDate,
                'products_price' => $totalPrice,
                'delivery_price' => 0, // Добавить расчет стоимости доставки, если необходимо
                'total_price' => $totalPrice,
            ]);

            // Создание записей для купленных товаров и обновление остатков
            foreach ($productsData as $productData) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['product']->id,
                    'product_quantity' => $productData['quantity'],
                    'product_price' => $productData['price'],
                    'product_discount' => $productData['discount'],
                    'product_price_with_discount' => $productData['price_with_discount'],
                ]);

                $productData['product']->decrement('amount', $productData['quantity']);
            }

            // Обработка оплаты
            if ($data['payment_type_id'] === PaymentType::EPAY) {
                // TODO: Реализовать ePay оплату
            }

            DB::commit();

            // TODO: Реализовать уведомление складмену

            return response()->json([
                'message' => 'Заказ успешно создан.',
                'order_id' => $order->id,
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Произошла ошибка при создании заказа.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

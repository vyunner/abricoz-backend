<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Address;
use App\Models\DeliveryInterval;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\UserDevice;
use App\Services\FirebaseNotificationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Order
 */
class OrderStoreController extends Controller
{
    public function __construct(
        protected FirebaseNotificationService $firebaseNotificationService,
    )
    {
    }

    /**
     * Создание заказа
     * @param OrderStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(OrderStoreRequest $request)
    {
        $data = $request->validated();

        $interval = DeliveryInterval::findOrFail($data['delivery_interval_id']);

        // Проверка количества заказов
        $orders_count = Order::where('user_id', $request->user()->id)
            ->whereIn('order_status_id', [
                OrderStatus::IN_PROCESS,
                OrderStatus::ASSEMBLING,
                OrderStatus::WAITING_FOR_COURIER,
                OrderStatus::ON_THE_WAY,
            ])
            ->count();

        if ($orders_count >= Order::MAX_COUNT) {
            return $this->response(null, __('response.order.error.limit'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Проверка суммы заказа
        $products_price = 0;

        foreach ($data['products'] as $product_data) {
            $product = Product::findOrFail($product_data['product_id']);
            $products_price += $product->price_with_discount * ($product_data['product_quantity'] ?? 1);

            // Проверка на активность
            if ($product->inactive) {
                return $this->response(null, __('response.product.error.inactive', ['name' => $product->name_ru]), Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Проверка на количество
            if ($product->amount < $product_data['product_quantity']) {
                return $this->response(null, __('response.product.error.quantity', ['name' => $product->name_ru]), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }

        if ($products_price < Order::MIN_SUM) {
            return $this->response(null, __('response.order.error.min_sum', ['curr_sum' => $products_price]), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Попытка парсинга временного интервала
        try {
            $time_range = explode(' - ', $interval->name);
            $start_time = $time_range[0];
        } catch (\Exception $e) {
            \Log::error('delivery_interval_incorrect_format', ['exception' => $e]);

            return $this->response(null, __('response.error.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $start_datetime = Carbon::parse($data['delivery_date'])->setTimeFromTimeString($start_time);

        // Проверяем, что интервал начинается после текущего времени
        if (!now()->lessThan($start_datetime)) {
            return $this->response(null, __('response.delivery_interval.error.unknown'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        DB::beginTransaction();
        try {
            // Находим адрес по его ID
            $address = Address::findOrFail($data['address_id']);

            // Создаем заказ с учетом адресных полей
            $order = Order::create([
                'user_id' => $request->user()->id,
                'order_status_id' => OrderStatus::IN_PROCESS,
                'delivery_interval_id' => $data['delivery_interval_id'],
                'delivery_date' => $start_datetime->toDateString(),
                'payment_type_id' => $data['payment_type_id'],
                'city_id' => $address->city_id,
                'address_street_and_house' => $address->address_street_and_house,
                'address_apartment' => $address->address_apartment,
                'address_entrance' => $address->address_entrance,
                'address_floor' => $address->address_floor,
                'address_comment' => $address->address_comment,
                'longitude' => $address->longitude,
                'latitude' => $address->latitude,
                'products_price' => 0, // Будет рассчитано позже
                'delivery_price' => 0, // Можно рассчитать отдельно или фиксировать
                'total_price' => 0, // Будет рассчитано позже
            ]);

            $products_price = 0;

            // Проходимся по каждому продукту в заказе
            foreach ($data['products'] as $product_data) {
                $product = Product::findOrFail($product_data['product_id']);
                $quantity = $product_data['product_quantity'] ?? 1;

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
                $products_price += $product->price_with_discount * $quantity;
                $product->amount -= $quantity;
                $product->save();
            }

            // Обновляем цены заказа
            $order->update([
                'products_price' => $products_price,
                'delivery_price' => 0, // Здесь можно рассчитать доставку
                'total_price' => $products_price, // Например, только сумма продуктов, можно добавить доставку
            ]);

            // Загружаем необходимые связи
            $order->load('orderStatus', 'paymentType', 'orderProducts.product');

            // Подготавливаем данные для ответа
            $response = [
                'order_id' => $order->id,
                'payment_type' => $order->paymentType->name,
                'total_price' => $order->total_price,
                'order_status' => $order->orderStatus->name,
                'order_products' => $order->orderProducts->map(function ($order_product) {
                    return [
                        'product_id' => $order_product->product_id,
                        'photo_url' => $order_product->product->photo_url,
                        'name_ru' => $order_product->product->name_ru,
                        'name_en' => $order_product->product->name_en,
                        'name_kz' => $order_product->product->name_kz,
                        'price' => $order_product->product_price,
                        'price_with_discount' => $order_product->product_price_with_discount,
                        'weight' => $order_product->product->weight,
                    ];
                }),
            ];

            DB::commit();

            // Получаем всех пользователей с ролью warehouseman
            $warehousemans = User::role('warehouseman')->get();

            foreach ($warehousemans as $warehouseman) {
                // Получаем устройства пользователя с FCM токенами
                $userDevices = UserDevice::where('user_id', $warehouseman->id)
                    ->where('fcm_token_type_id', 2)
                    ->get();

                foreach ($userDevices as $device) {
                    // Отправляем уведомление на каждый FCM токен
                    $this->firebaseNotificationService->sendNotification(
                        'app2', // Идентификатор приложения ('app1' или 'app2')
                        $device->fcm_token, // Токен устройства
                        [
                            'title' => 'Уведомление складмену',
                            'body' => 'Соберите заказ!',
                            'data' => [
                                'order_id' => (string)$order->id,
                                'order_status_id' => (string)$order->order_status_id,
                            ],
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('order_create_error', ['exception' => $e]);

            return $this->response(null, __('response.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->response($response, __('response.order.success.create'));
    }
}

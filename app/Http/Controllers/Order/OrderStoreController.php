<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentType;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\DeliveryInterval;
use App\Models\Address;
use App\Models\TelegramUser;
use App\Models\UserCard;
use App\Services\EpayService;
use App\Services\FirebaseNotificationService;
use App\Services\TelegramService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Services\WebKassaService;
use Illuminate\Support\Facades\Log;

class OrderStoreController extends Controller
{
    protected EpayService $epayService;
    protected FirebaseNotificationService $firebaseNotificationService;
    protected TelegramService $telegramService;
    protected WebKassaService $webKassaService;

    public function __construct(
        EpayService                 $epayService,
        FirebaseNotificationService $firebaseNotificationService,
        TelegramService             $telegramService,
        WebKassaService             $webKassaService
    )
    {
        $this->epayService = $epayService;
        $this->firebaseNotificationService = $firebaseNotificationService;
        $this->telegramService = $telegramService;
        $this->webKassaService = $webKassaService;
    }

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

//        ✅ 1. Постоянное условие: запрещает даты раньше сегодня
        if ($deliveryDate->lt(Carbon::today())) {
            return response()->json(['message' => 'Дата доставки не может быть раньше сегодняшней.'], 422);
        }

//        🕒 2. Временное условие(закомментируй при необходимости): запрещает доставку в день заказа
//        if (Carbon::today()->gte($deliveryDate)) {
//            return response()->json(['message' => 'Доставка должна оформляться минимум за день до даты доставки.'], 422);
//        }

        // Проверка временного интервала, если дата доставки сегодня
        if ($deliveryDate->isToday()) {
            [$start, $end] = explode(' - ', $deliveryInterval->name);
            if (Carbon::now()->gt(Carbon::createFromFormat('H:i', $start))) {
                return response()->json(['message' => 'Выбранный временной интервал недоступен.'], 422);
            }
        }

//        // Проверка количества активных заказов пользователя (не более 3)
        $activeOrdersCount = Order::where('user_id', $user->id)
            ->whereIn('order_status_id', [
                OrderStatus::IN_PROCESS,
                OrderStatus::ASSEMBLING,
                OrderStatus::WAITING_FOR_COURIER,
                OrderStatus::ON_THE_WAY,
            ])->count();

        if ($activeOrdersCount >= 10) {
            return response()->json(['message' => 'Вы не можете иметь более 3 активных заказов.'], 422);
        }

        // Проверка карты пользователя, если выбран способ оплаты банковской картой
        $cardMask = null;
        $issuer = null;

        if ($data['payment_type_id'] === PaymentType::EPAY) {
            if (!isset($data['user_card_id'])) {
                return response()->json(['message' => 'user_card_id отсутствует'], 422);
            }

            $userCard = UserCard::find($data['user_card_id']);

            if (!$userCard || $userCard->user_id !== $user->id) {
                return response()->json(['message' => 'Карта не найдена или не принадлежит пользователю.'], 422);
            }

            $cardMask = $userCard->cardMask;
            $issuer = $userCard->issuer;
        }

        // Проверка товаров и подсчет общей суммы
        $totalPrice = 0;
        $totalPriceCost = 0;
        $productsData = [];

        $positions = [];
        foreach ($data['products'] as $productItem) {
            $product = Product::find($productItem['product_id']);

            if (!$product || !$product->is_active) {
                return response()->json(['message' => "Товар недоступен: {$product->name_ru}."], 422);
            }

            if ($product->amount < $productItem['product_quantity']) {
                return response()->json(['message' => "Недостаточно товара: {$product->name_ru}."], 422);
            }

            $linePrice = $product->price_with_discount * $productItem['product_quantity'];
            $linePriceCost = $product->price_cost * $productItem['product_quantity'];
            $totalPrice += $linePrice;
            $totalPriceCost += $linePriceCost;

            $productsData[] = [
                'product' => $product,
                'quantity' => $productItem['product_quantity'],
                'price' => $product->price,
                'discount' => $product->discount,
                'price_with_discount' => $product->price_with_discount,
                'line_price' => $linePrice,
            ];

            $positions[] = [
                'PositionName' => $product->name_ru . ' ' . $product->weight,
                'PositionCode' => (string)$product->id,
                'Price' => $product->price_with_discount,
                'Count' => $productItem['product_quantity'],
                'TaxPercent' => null,
                'Tax' => 0,
                'TaxType' => 0,
                'UnitCode' => 796,
                'Discount' => 0,
                'Markup' => 0
            ];
        }

        // Проверка минимальной суммы заказа (5000 тенге)
        if ($totalPrice < 500) {
            return response()->json(['message' => 'Минимальная сумма заказа - 4000 тенге.'], 422);
        }

        $lowStockItems = []; // для сообщений о товарах с остатком ≤ 3
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
                'total_price_cost' => $totalPriceCost,
                'cardMask' => $cardMask,
                'issuer' => $issuer,
            ]);

            // Создание записей для купленных товаров и обновление остатков
            foreach ($productsData as $productData) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $productData['product']->id,
                    'product_weight' => $productData['product']->weight,
                    'product_quantity' => $productData['quantity'],
                    'product_price' => $productData['price'],
                    'product_discount' => $productData['discount'],
                    'product_price_with_discount' => $productData['price_with_discount'],
                    'product_price_cost' => $productData['product']->price_cost,
                ]);

                $remaining = $productData['product']->stock_quantity - $productData['quantity'];

                if ($remaining <= 1) {
                    if ($remaining < 0) {
                        $statusText = '❌ Закупить';
                        $lowStockItems[] = "{$statusText}: {$productData['product']->name_ru} (" . abs($remaining) . " x {$productData['product']->weight})";
                    } else {
                        $statusText = $remaining === 0 ? '⚠️ Товар закончился' : '⚠️ Товар почти закончился';
                        $lowStockItems[] = "{$statusText}: {$productData['product']->name_ru} ({$remaining} x {$productData['product']->weight} осталось)";
                    }
                }

                $productData['product']->decrement('amount', $productData['quantity']);
                $productData['product']->decrement('stock_quantity', $productData['quantity']);
                $productData['product']->increment('total_sales', $productData['quantity']);
            }

            // Обработка оплаты
            if ($data['payment_type_id'] === PaymentType::EPAY) {
                $config = config('epay');

                $invoice_id = $this->epayService->generateInvoiceId($order->id);

                $tokenResponse = $this->epayService->getToken([
                    'grant_type' => 'client_credentials',
                    'scope' => 'webapi usermanagement email_send verification statement statistics payment',
                    'client_id' => $config['client_id'],
                    'client_secret' => $config['client_secret'],
                    'invoiceID' => $invoice_id,
                    'amount' => $totalPrice,
                    'currency' => 'KZT',
                    'terminal' => $config['terminal_id']
                ]);

                if (!isset($tokenResponse['access_token'])) {
                    return response()->json([
                        'resultCode' => '500',
                        'resultMessage' => 'Failed to retrieve Epay API token',
                    ], 500);
                }

                $accessToken = $tokenResponse['access_token'];

                $postData = [
                    'amount' => $totalPrice,
                    'currency' => 'KZT',
                    'terminalId' => $config['terminal_id'],
                    'invoiceId' => $invoice_id,
                    'invoiceIdAlt' => $invoice_id,
                    'description' => "Оплата заказа №$order->id-$invoice_id",
                    'accountId' => $invoice_id,
                    'backLink' => 'https://abricoz.kz/success-payment',
                    'failureBackLink' => 'https://abricoz.kz/failure-payment',
                    'postLink' => 'https://api.abricoz.kz/epay/success',
                    'failurePostLink' => 'https://api.abricoz.kz/epay/failure',
                    'paymentType' => 'cardId',
                    'cardId' => ['id' => $userCard->cardID],
                ];

                // Отправляем запрос в Epay API с токеном
                $url = "https://epay-api.homebank.kz/payments/cards/auth";

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$accessToken}",
                ])->post($url, $postData);

                if (!$response->successful()) {
                    DB::rollBack(); // ⬅️ Откат транзакции при ошибке запроса

                    return response()->json([
                        'resultCode' => $response->status(),
                        'resultMessage' => 'Ошибка при отправке запроса в Epay',
                        'error' => $response->json() ?? $response->body(), // Возвращаем тело ответа от Epay для диагностики
                    ], $response->status());
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Ошибка WebKassa при создании чека: " . $e->getMessage());

            return response()->json([
                'message' => 'Произошла ошибка при создании заказа.',
                'error' => $e->getMessage(),
            ], 500);
        }

        $telegramUsers = TelegramUser::all();

        // ✅ Отправляем чек в WebKassa после успешного сохранения заказа
        try {
            $webkassaPaymentType = null;

            if ($data['payment_type_id'] === PaymentType::CASH) {
                $webkassaPaymentType = 0;
            } elseif ($data['payment_type_id'] === PaymentType::EPAY) {
                $webkassaPaymentType = 1;

                $this->webKassaService->createCheck(
                    $order->id,
                    $positions,
                    $totalPrice,
                    2, // 2 - Продажа
                    $webkassaPaymentType,
                    null,
                    $user->phone,
                    $user->email
                );
            }
        } catch (\Exception $e) {
            Log::error("Ошибка WebKassa при создании чека: " . $e->getMessage());

            // ❗ Уведомляем администраторов в Telegram
            foreach ($telegramUsers as $telegramUser) {
                $this->telegramService->sendMessage($telegramUser->chat_id, "🚨 Ошибка WebKassa: {$e->getMessage()}");
            }
        }

        // ✅ Загружаем связанные модели одним запросом
        $order->load(['products', 'user', 'deliveryInterval']);

        $deliveryDate = Carbon::parse($order->delivery_date)->format('d.m.Y');

        // ✅ Формируем сообщение
        $message = "<b>📦 Новый заказ #{$order->id}</b>\n\n"
            . "<b>👤 ФИО:</b> {$order->user->firstname} {$order->user->lastname}\n"
            . "<b>📞 Телефон:</b> {$order->user->phone}\n"
            . "<b>📍 Адрес:</b> {$order->address_street_and_house}, {$order->address_apartment}, "
            . "подъезд {$order->address_entrance}, этаж {$order->address_floor}\n"
            . "<b>📅 Дата доставки:</b> {$deliveryDate}\n"
            . "<b>🕘 Время доставки:</b> {$order->deliveryInterval->name}\n"
            . "<b>📌 Комментарий:</b> " . ($order->address_comment ?? "Нет") . "\n\n"
            . "<b>🛒 Товары:</b>\n";

        // ✅ Формируем список товаров
        foreach ($order->products as $product) {
            $message .= " - {$product->name_ru} \n ({$product->pivot->product_quantity} x {$product->weight}) – "
                . "{$product->pivot->product_price_with_discount} ₸, <b>" . ($product->pivot->product_quantity * $product->pivot->product_price_with_discount)
                . "</b> ₸\n\n";
        }

        $message .= "\n<b>💰 Итоговая сумма:</b> {$order->total_price} ₸";

        if ($data['payment_type_id'] === PaymentType::CASH) {
            $message .= "\n<b>❗️❗️❗️ НАЛИЧКА ❗️❗️❗️</b>";
        }

        // ✅ Отправляем уведомление всем администраторам одним циклом
        foreach ($telegramUsers as $telegramUser) {
            $this->telegramService->sendMessage($telegramUser->chat_id, $message, "HTML");
        }

        if (!empty($lowStockItems)) {
            $stockMessage = "<b>🔔 Заканчивающиеся товары:</b>\n\n" . implode("\n", $lowStockItems);

            foreach ($telegramUsers as $telegramUser) {
                try {
                    $this->telegramService->sendMessage($telegramUser->chat_id, $stockMessage, "HTML");
                } catch (\Throwable $e) {
                    Log::error("Ошибка отправки уведомления о заканчивающихся товарах: " . $e->getMessage());
                }
            }
        }

        return response()->json([
            'message' => 'Заказ успешно создан.',
            'order_id' => $order->id,
        ], 201);
    }
}

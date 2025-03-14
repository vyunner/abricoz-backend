<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Receipt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Carbon\Carbon;
use Exception;

class WebKassaService
{
    protected string $apiUrl;
    protected string $apiKey;
    protected string $cashboxNumber;
    protected string $login;
    protected string $password;

    public function __construct()
    {
        $this->apiUrl = config('webkassa.api_url');
        $this->apiKey = config('webkassa.api_key');
        $this->cashboxNumber = config('webkassa.cashbox_number');
        $this->login = config('webkassa.login');
        $this->password = config('webkassa.password');
    }

    /**
     * Получение токена WebKassa с кешированием на 24 часа.
     *
     * @return string Токен авторизации
     * @throws Exception Если ошибка авторизации
     */
    public function getToken(): string
    {
        return Cache::remember('webkassa_token', Carbon::now()->addHours(24), function () {
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey
            ])->post("$this->apiUrl/Authorize", [
                'Login' => $this->login,
                'Password' => $this->password
            ]);

            if ($response->failed()) {
                $errors = $response->json('Errors') ?? [];

                foreach ($errors as $error) {
                    if ($error['Code'] == 1) {
                        throw new Exception("Ошибка WebKassa: Неверный логин/пароль.");
                    }
                }

                throw new Exception("Ошибка авторизации WebKassa: " . json_encode($errors));
            }

            return $response->json('Data.Token');
        });
    }

    /**
     * Пробитие чека в WebKassa.
     *
     * @param int $orderId ID заказа
     * @param array $positions Массив позиций чека. Пример:
     * [
     *     [
     *         "PositionName" => "Яблоки 1 кг",
     *         "PositionCode" => "12345",
     *         "Price" => 1000.00,
     *         "Count" => 2,
     *         "TaxPercent" => 12,
     *         "UnitCode" => 796,
     *         "Discount" => 0,
     *         "Markup" => 0
     *     ]
     * ]
     * @param float $totalSum Итоговая сумма чека
     * @param int $operationType Тип операции (2 - продажа, 3 - возврат продажи, 4 - покупка, 5 - возврат покупки)
     * @param string|null $customerXin ИИН/БИН покупателя (если нужен)
     * @param string|null $customerPhone Телефон покупателя (если нужен)
     * @param string|null $customerEmail Email покупателя (если нужен)
     * @return array Ответ WebKassa с номером чека и ссылкой на печать
     * @throws Exception Если ошибка WebKassa
     */
    public function createCheck(int $orderId, array $positions, float $totalSum, int $operationType, ?string $customerXin = null, ?string $customerPhone = null, ?string $customerEmail = null): array
    {
        $lock = Cache::lock('webkassa_lock', 10);

        if (!$lock->get()) {
            throw new Exception("Очередь WebKassa заблокирована, попробуйте позже.");
        }

        try {
            $token = $this->getToken();
            $externalCheckNumber = $this->generateCheckNumber($orderId);

            $payload = [
                'Token' => $token,
                'CashboxUniqueNumber' => $this->cashboxNumber,
                'OperationType' => $operationType,
                'Positions' => $positions,
                'Payments' => [
                    [
                        'Sum' => $totalSum,
                        'PaymentType' => 1
                    ]
                ],
                'ExternalCheckNumber' => $externalCheckNumber
            ];

            if ($customerXin) {
                $payload['CustomerXin'] = $customerXin;
            }
            if ($customerPhone) {
                $payload['CustomerPhone'] = $customerPhone;
            }
            if ($customerEmail) {
                $payload['CustomerEmail'] = $customerEmail; // WebKassa сама отправит чек
            }

            $response = Http::post("$this->apiUrl/Check", $payload);

            if ($response->failed()) {
                $errors = $response->json('Errors') ?? [];

                foreach ($errors as $error) {
                    if ($error['Code'] == 2) {
                        Cache::forget('webkassa_token');
                        return $this->createCheck($orderId, $positions, $totalSum, $operationType, $customerXin, $customerPhone, $customerEmail);
                    }

                    throw new Exception("Ошибка WebKassa: " . json_encode($errors));
                }
            }

            // ✅ Сохраняем чек в БД
            Receipt::create([
                'order_id' => $orderId,
                'check_number' => $response->json('Data.CheckNumber'),
                'ticket_print_url' => $response->json('Data.TicketPrintUrl')
            ]);

            // ✅ Обновляем статус заказа, что чек пробит
            Order::where('id', $orderId)->update(['is_receipt_generated' => true]);

            return [
                'CheckNumber' => $response->json('Data.CheckNumber'),
                'TicketPrintUrl' => $response->json('Data.TicketPrintUrl')
            ];
        } finally {
            $lock->release();
        }
    }

    /**
     * Генерация номера чека.
     *
     * @param int $orderId ID заказа
     * @return string Номер чека в формате "$orderId + последние 6 цифр времени"
     */
    private function generateCheckNumber(int $orderId): string
    {
        return $orderId . substr(time(), -6);
    }

    /**
     * Закрытие смены (Z-отчет).
     *
     * @return array Ответ WebKassa
     * @throws Exception Если ошибка WebKassa
     */
    public function closeShift(): array
    {
        $token = $this->getToken();

        $payload = [
            'Token' => $token,
            'CashboxUniqueNumber' => $this->cashboxNumber
        ];

        $response = Http::post("$this->apiUrl/ZReport", $payload);

        if ($response->failed()) {
            throw new Exception("Ошибка WebKassa при закрытии смены: " . json_encode($response->json('Errors')));
        }

        return $response->json();
    }
}

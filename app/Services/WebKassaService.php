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
    public function createCheck(int $orderId, array $positions, float $totalSum, int $operationType, ?string $customerXin = null, ?string $customerPhone = null, ?string $customerEmail = null, int $attempt = 1): array
    {
        try {
            $token = $this->getToken(); // Берем токен
            $externalCheckNumber = $this->generateCheckNumber($orderId);

            $payload = [
                'Token' => $token,
                'CashboxUniqueNumber' => $this->cashboxNumber,
                'OperationType' => $operationType,
                'Positions' => $positions,
                'Payments' => [
                    ['Sum' => $totalSum, 'PaymentType' => 1]
                ],
                'ExternalCheckNumber' => $externalCheckNumber
            ];

            if ($customerXin) $payload['CustomerXin'] = $customerXin;
            if ($customerPhone) $payload['CustomerPhone'] = $customerPhone;
            if ($customerEmail) $payload['CustomerEmail'] = $customerEmail;

            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey
            ])->post("$this->apiUrl/Check", $payload);

            $responseData = $response->json();

            // ✅ Проверяем ошибки от WebKassa
            if (isset($responseData['Errors']) && !empty($responseData['Errors'])) {
                foreach ($responseData['Errors'] as $error) {
                    if ($error['Code'] == 2 && $attempt < 3) {
                        Cache::forget('webkassa_token'); // ❗ Удаляем токен и пробуем снова
                        return $this->createCheck($orderId, $positions, $totalSum, $operationType, $customerXin, $customerPhone, $customerEmail, $attempt + 1);
                    }

                    throw new Exception("Ошибка WebKassa: {$error['Code']} - {$error['Text']}");
                }
            }

            // ✅ Проверяем, вернула ли WebKassa `CheckNumber`
            if (empty($responseData['Data']['CheckNumber'])) {
                Log::error("WebKassa не вернула CheckNumber!", ['response' => $responseData]);
                throw new Exception("Ошибка WebKassa: CheckNumber отсутствует");
            }

            // ✅ Сохраняем чек в БД
            Receipt::create([
                'order_id' => $orderId,
                'check_number' => $responseData['Data']['CheckNumber'],
                'ticket_print_url' => $responseData['Data']['TicketPrintUrl']
            ]);

            Order::where('id', $orderId)->update(['is_receipt_generated' => true]);

            return [
                'CheckNumber' => $responseData['Data']['CheckNumber'],
                'TicketPrintUrl' => $responseData['Data']['TicketPrintUrl']
            ];
        } catch (\Exception $e) {
            Log::error("Ошибка WebKassa: " . $e->getMessage());
            throw $e;
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

        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey
        ])->post("$this->apiUrl/ZReport", $payload);

        if ($response->failed()) {
            throw new Exception("Ошибка WebKassa при закрытии смены: " . json_encode($response->json('Errors')));
        }

        return $response->json();
    }
}

<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Receipt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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
        Log::channel('webkassa')->info('Запрос токена WebKassa.');

        return Cache::remember('webkassa_token', Carbon::now()->addHours(24), function () {
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey
            ])->post("$this->apiUrl/Authorize", [
                'Login' => $this->login,
                'Password' => $this->password
            ]);

            $responseData = $response->json();

            if (isset($responseData['Errors']) && !empty($responseData['Errors'])) {
                Log::channel('webkassa')->error("Ошибка при получении токена WebKassa", ['errors' => $responseData['Errors']]);
                throw new Exception("Ошибка авторизации WebKassa: " . json_encode($responseData['Errors'], JSON_UNESCAPED_UNICODE));
            }

            Log::channel('webkassa')->info('Токен WebKassa успешно получен.');

            return $responseData['Data']['Token'];
        });
    }

    /**
     * Пробитие чека в WebKassa.
     */
    public function createCheck(int $orderId, array $positions, float $totalSum, int $operationType, ?string $customerXin = null, ?string $customerPhone = null, ?string $customerEmail = null, int $attempt = 1): array
    {
        try {
            Log::channel('webkassa')->info("Начало пробития чека", compact('orderId', 'totalSum', 'operationType'));

            $token = $this->getToken();
            $externalCheckNumber = $this->generateCheckNumber($orderId);

            $payload = [
                'Token' => $token,
                'CashboxUniqueNumber' => $this->cashboxNumber,
                'OperationType' => $operationType,
                'Positions' => $positions,
                'Payments' => [['Sum' => $totalSum, 'PaymentType' => 1]],
                'ExternalCheckNumber' => $externalCheckNumber
            ];

            if ($customerXin) $payload['CustomerXin'] = $customerXin;
            if ($customerPhone) $payload['CustomerPhone'] = $customerPhone;
            if ($customerEmail) $payload['CustomerEmail'] = $customerEmail;

            $response = Http::withHeaders(['X-API-KEY' => $this->apiKey])
                ->post("$this->apiUrl/Check", $payload);

            $responseData = $response->json();

            Log::channel('webkassa')->info("Ответ WebKassa", ['response' => $responseData]);

            if (isset($responseData['Errors']) && !empty($responseData['Errors'])) {
                foreach ($responseData['Errors'] as $error) {
                    if ($error['Code'] == 2 && $attempt < 3) {
                        Cache::forget('webkassa_token');
                        Log::channel('webkassa')->warning("Токен истёк. Повторная попытка {$attempt}/3.");
                        return $this->createCheck($orderId, $positions, $totalSum, $operationType, $customerXin, $customerPhone, $customerEmail, $attempt + 1);
                    }

                    Log::channel('webkassa')->error("Ошибка WebKassa", ['code' => $error['Code'], 'message' => $error['Text']]);
                    throw new Exception("Ошибка WebKassa: {$error['Code']} - {$error['Text']}");
                }
            }

            if (empty($responseData['Data']['CheckNumber'])) {
                Log::channel('webkassa')->error("WebKassa не вернула CheckNumber", ['response' => $responseData]);
                throw new Exception("Ошибка WebKassa: CheckNumber отсутствует");
            }

            Receipt::create([
                'order_id' => $orderId,
                'check_number' => $responseData['Data']['CheckNumber'],
                'ticket_print_url' => $responseData['Data']['TicketPrintUrl']
            ]);

            Order::where('id', $orderId)->update(['is_receipt_generated' => true]);

            Log::channel('webkassa')->info("Чек успешно пробит", [
                'CheckNumber' => $responseData['Data']['CheckNumber'],
                'TicketPrintUrl' => $responseData['Data']['TicketPrintUrl']
            ]);

            return [
                'CheckNumber' => $responseData['Data']['CheckNumber'],
                'TicketPrintUrl' => $responseData['Data']['TicketPrintUrl']
            ];
        } catch (\Exception $e) {
            Log::channel('webkassa')->error("Ошибка при пробитии чека", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Генерация номера чека.
     */
    private function generateCheckNumber(int $orderId): string
    {
        return $orderId . substr(time(), -6);
    }

    /**
     * Закрытие смены (Z-отчет).
     */
    public function closeShift(): array
    {
        try {
            Log::channel('webkassa')->info("Закрытие смены WebKassa.");

            $token = $this->getToken();

            $payload = [
                'Token' => $token,
                'CashboxUniqueNumber' => $this->cashboxNumber
            ];

            $response = Http::withHeaders(['X-API-KEY' => $this->apiKey])
                ->post("$this->apiUrl/ZReport", $payload);

            $responseData = $response->json();

            if ($response->failed()) {
                Log::channel('webkassa')->error("Ошибка при закрытии смены", ['response' => $responseData]);
                throw new Exception("Ошибка WebKassa при закрытии смены: " . json_encode($responseData['Errors']));
            }

            Log::channel('webkassa')->info("Смена успешно закрыта", ['response' => $responseData]);

            return $responseData;
        } catch (\Exception $e) {
            Log::channel('webkassa')->error("Ошибка при закрытии смены", ['message' => $e->getMessage()]);
            throw $e;
        }
    }
}

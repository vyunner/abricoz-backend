<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WebKassaService
{
    protected string $apiUrl;
    protected string $apiKey;
    protected string $login;
    protected string $password;
    protected string $cashbox;

    public function __construct()
    {
        $this->apiUrl = config('webkassa.api_url');
        $this->apiKey = config('webkassa.api_key');
        $this->login = config('webkassa.login');
        $this->password = config('webkassa.password');
        $this->cashbox = config('webkassa.cashbox');
    }

    /**
     * Получаем токен (авторизация в WebKassa)
     */
    public function getToken(): string
    {
        return Cache::remember('webkassa_token', 86400, function () {
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey
            ])->post("$this->apiUrl/Authorize", [
                'Login' => $this->login,
                'Password' => $this->password
            ]);

            if ($response->failed()) {
                throw new \Exception("Ошибка авторизации WebKassa: " . $response->body());
            }

            return $response->json('Data.Token');
        });
    }

    /**
     * Пробиваем чек
     */
    public function createCheck(int $order_id, array $items, float $total, float $payment, int $operationType = 2)
    {
        $token = $this->getToken();
        $checkNumber =  $order_id . substr(time(), -6); // Генерация уникального номера чека

        $payload = [
            'Token' => $token,
            'CashboxUniqueNumber' => $this->cashbox,
            'OperationType' => $operationType,
            'Positions' => $items,
            'Payments' => [['Sum' => $payment, 'PaymentType' => 1]],
            'ExternalCheckNumber' => $checkNumber,
            'RoundType' => 2
        ];

        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey
        ])->post("$this->apiUrl/Check", $payload);

        if ($response->failed()) {
            throw new \Exception("Ошибка при пробитии чека: " . $response->body());
        }

        return $response->json('Data');
    }

    /**
     * Закрытие смены (Z-отчет)
     */
    public function closeShift()
    {
        $token = $this->getToken();

        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey
        ])->post("$this->apiUrl/ZReport", [
            'Token' => $token,
            'CashboxUniqueNumber' => $this->cashbox
        ]);

        if ($response->failed()) {
            throw new \Exception("Ошибка при закрытии смены: " . $response->body());
        }

        return $response->json('Data');
    }
}

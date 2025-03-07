<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WebkassaService
{
    private string $apiKey;
    private string $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('webkassa.api_key');
        $this->apiUrl = config('webkassa.api_url');
    }

    /**
     * Авторизация пользователя (кассира) в Webkassa и получение токена
     *
     * @param string $login
     * @param string $password
     * @return string|null
     */
    public function authorizeUser(string $login, string $password): ?string
    {
        $endpoint = $this->apiUrl . '/Authorize';

        $response = \Http::withHeaders([
            'X-API-KEY' => $this->apiKey,
            'Accept' => 'application/json',
        ])->post($endpoint, [
            'Login' => $login,
            'Password' => $password,
        ]);

        if ($response->successful()) {
            return $response->json('Data.Token');
        }

        Log::error('Ошибка авторизации Webkassa', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);

        return null;
    }
}

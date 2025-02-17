<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EpayService
{
    public function __construct()
    {
        $this->config = config('epay');
    }

    public function generateInvoiceId($number): string
    {
        return $number . substr(time(), -6);
    }

    public function getToken(array $params)
    {
        $response = Http::asForm()->post('https://epay-oauth.homebank.kz/oauth2/token', $params);
        return $response->json();
    }

    public function getIpInfo($ip)
    {
        $response = Http::get("https://ipinfo.io/{$ip}/json");
        return $response->json();
    }
}

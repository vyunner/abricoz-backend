<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MobizonService
{
    protected $apiKey;
    protected $baseUrl = 'https://api.mobizon.kz/service/';

    public function __construct()
    {
        $this->apiKey = env('MOBIZON_API_KEY');
    }

    public function sendSmsMessage($recipient, $text, $from = null, $params = [])
    {
        $url = $this->baseUrl . 'Message/SendSmsMessage';
        $data = [
            'recipient' => $recipient,
            'text' => $text,
        ];

        if ($from !== null) {
            $data['from'] = $from;
        }

        if (!empty($params)) {
            $data['params'] = $params;
        }

        return $this->makeRequest($url, $data);
    }

    public function getSmsStatus($ids)
    {
        $url = $this->baseUrl . 'Message/GetSMSStatus';
        $data = [
            'ids' => $ids,
        ];

        return $this->makeRequest($url, $data);
    }

    public function listMessages($criteria = [], $pagination = [], $sort = [], $withNumberInfo = 0)
    {
        $url = $this->baseUrl . 'Message/List';
        $data = [
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
            'withNumberInfo' => $withNumberInfo,
        ];

        return $this->makeRequest($url, $data);
    }

    protected function makeRequest($url, $data)
    {
        $response = Http::withHeaders([
            'cache-control' => 'no-cache',
            'content-type' => 'application/x-www-form-urlencoded',
        ])
            ->withOptions(['query' => [
                    'output' => 'json',
                    'api' => 'v1',
                    'apiKey' => $this->apiKey,
                ] + $data])
            ->post($url);

        return $response->json();
    }
}

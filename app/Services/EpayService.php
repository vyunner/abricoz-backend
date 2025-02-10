<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EpayService
{
    private array $config = [];
    private ?string $access_token;
    private ?string $refresh_token;

    public function __construct()
    {
        $this->config = config('epay');
    }

    private function getOauthUrl(): string
    {
        return $this->config['test_mode'] ? config('epay.test_url') : config('epay.prod_url');
    }

    private function getInvoiceUrl(): string
    {
        return $this->config['test_mode'] ? 'https://testepay.homebank.kz/api/invoice' : 'https://epay-api.homebank.kz/invoice';
    }

    private function getToken(): string
    {
        $response = Http::asForm()->post($this->config['oauth_url'], [
            'grant_type' => 'password',
            'username' => $this->config['email'],
            'password' => $this->config['password'],
            'scope' => 'webapi usermanagement email_send verification statement statistics payment',
            'client_id' => $this->config['client_id'],
            'client_secret' => $this->config['client_secret'],
            'secret_hash' => $this->config['secret_hash'],
        ]);

        $data = $response->json();

        if (false === $response->successful()) {
            \Log::error('Error while getting access token', ['response' => $data]);

            throw new \Exception('Error while getting access token');
        }

        try {
            $this->access_token = $data['access_token'];
            $this->refresh_token = $data['refresh_token'];
        } catch (\Exception $e) {
            \Log::error('Error while getting access token', ['response' => $data, 'error' => $e->getMessage()]);

            throw new \Exception('Error while getting access token');
        }

        return $this->access_token;
    }

    /**
     * @return array <string, mixed> {
     *    id: string("498331aa-b69f-41ec-b9f5-8e1c3d6b5db1"),
     *    shop_id: string("04f25a4b-d2bd-4dd8-b3a7-9390be4774c4"),
     *    amount: int(1180),
     *    invoice_id: string("121738945359"),
     *    invoice_alt: string(""),
     *    language: string("ru"),
     *    currency: string("KZT"),
     *    description: string("Оплата заказа #121738945359"),
     *    account_id: string("7026207447"),
     *    recipient_contact: string(""),
     *    recipient_contact_sms: string("+77022363206"),
     *    notifier_contact: string(""),
     *    notifier_contact_sms: string("+77022363206"),
     *    expire_period: string("1d"),
     *    post_link: string("http://127.0.0.1:8000/api/epay/success"),
     *    failure_post_link: string("http://127.0.0.1:8000/api/epay/failure"),
     *    back_link: string("http://127.0.0.1:8000/back_link"),
     *    failure_back_link: string("http://127.0.0.1:8000/failure_back_link"),
     *    created_date: timestamp("2025-02-07T21:22:44.382801591+05:00"),
     *    expire_date: timestamp("2025-02-08T21:22:44.382801591+05:00"),
     *    status: string("ACTIVE"),
     *    updated_date: timestamp("0001-01-01T00:00:00Z"),
     *    invoice_url: string("https://testepay.homebank.kz/api/redirect/invoice-link/498331aa-b69f-41ec-b9f5-8e1c3d6b5db1"),
     *    merchant_id: string("ad638b1d-e515-4b9c-aab3-d3500735f6eb"),
     *    terminal_id: string("d9d7978c-d6ee-4ec0-8cda-165251a4bf16"),
     *    card_save: bool(false),
     *    data: string(""),
     * }
     */
    public function createInvoice(string $invoice_id, int $amount): array
    {
        $token = $this->getToken();

        $response = Http::withToken($token)->post($this->config['invoice_url'], [
            'shop_id' => $this->config['shop_id'],
            'account_id' => $this->config['account_id'],
            'invoice_id' => $invoice_id,
            'amount' => $amount,
            'language' => app()->getLocale(),
            'description' => "Оплата заказа #{$invoice_id}",
            'expire_period' => '3d',
            'recipient_contact' => auth()->user()->email,
            'recipient_contact_sms' => auth()->user()->phone,
            'currency' => 'KZT',
            'post_link' => config('app.url') . '/api/epay/success',
            'failure_post_link' => config('app.url') . '/api/epay/failure',
            'back_link' => 'abricos-success-pay.kz',
            'failure_back_link' => 'abricos-failure-pay.kz',
        ]);

        $data = $response->json();

        if (false === $response->successful()) {
            \Log::error('Error while getting invoice url', ['response' => $data]);

            throw new \Exception('Error while getting invoice url');
        }

        try {
            filter_var($data['invoice_url'], FILTER_VALIDATE_URL);
        } catch (\Exception $e) {
            \Log::error('Error while getting invoice url', ['response' => $data, 'error' => $e->getMessage()]);

            throw new \Exception('Error while getting invoice url');
        }

        return $data;
    }
}

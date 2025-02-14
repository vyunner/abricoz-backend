<?php

namespace App\Http\Controllers\Epay;

use App\Enums\OrderPaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use App\Services\EpayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

/**
 * @group Epay
 */
class EpayGetSaveCardToken extends Controller
{
    protected EpayService $epayService;

    public function __construct(EpayService $epayService)
    {
        $this->epayService = $epayService;
    }

    /**
     * Токен сохранения карты Epay
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $order_id)
    {
        try {
            $config = config('epay');

            $invoice_id = $this->epayService->generateInvoiceId($order_id);

            $token = $this->epayService->getToken([
                'grant_type' => 'client_credentials',
                'scope' => 'webapi usermanagement email_send verification statement statistics payment',
                'client_id' => $config['client_id'],
                'client_secret' => $config['client_secret'],
                'invoiceID' => $invoice_id,
                'amount' => 0,
                'currency' => 'USD',
                'terminal' => $config['terminal_id'],
            ]);

            return $token;

            $response = Http::asForm()->post('https://epay-oauth.homebank.kz/oauth2/token', $data);

            // Логируем ответ
            Log::info('Epay Token Response:', $response->json());

            // Возвращаем ответ API
            return response()->json([
                'success' => $response->successful(),
                'data' => $response->json()
            ], $response->status());

        } catch (\Exception $e) {
            Log::error('Epay Token Request Failed:', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при получении токена'
            ], 500);
        }
    }
}

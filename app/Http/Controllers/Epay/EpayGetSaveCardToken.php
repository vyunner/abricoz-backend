<?php

namespace App\Http\Controllers\Epay;

use App\Http\Controllers\Controller;
use App\Models\UserCard;
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
    public function __invoke(Request $request, $user_id)
    {
        try {
            $config = config('epay');

            $invoice_id = $this->epayService->generateInvoiceId($user_id);

            UserCard::create([
                'user_id' => $user_id,
                'invoice_id' => $invoice_id,
            ]);

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

            $ip_info = $this->epayService->getIpInfo($request->ip());

            return $this->response(['invoice_id' => $invoice_id, 'ip_info' => $ip_info, 'token' => $token], 'Успешно');
        } catch (\Exception $e) {
            Log::error('EpayGetSaveCardToken error:', ['error' => $e->getMessage()]);
            return $this->response([], $e->getMessage(), 500);
        }
    }
}

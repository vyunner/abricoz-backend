<?php

namespace App\Http\Controllers\Epay;

use App\Http\Controllers\Controller;
use App\Models\UserCard;
use App\Services\EpayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

/**
 * @group Epay
 */
class EpaySaveCardSuccessController extends Controller
{
    protected EpayService $epayService;

    public function __construct(EpayService $epayService)
    {
        $this->epayService = $epayService;
    }


    /**
     * Сохранение карты Epay
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $data = $request->input('data');

            // Проверяем, передан ли invoiceId
            if (!isset($data['invoiceId']) || empty($data['invoiceId'])) {
                return response()->json([
                    'resultCode' => '400',
                    'resultMessage' => 'Missing invoiceId',
                ], 400);
            }

            $invoiceId = $data['invoiceId'];
            $config = config('epay');

            $tokenResponse = $this->epayService->getToken([
                'grant_type' => 'client_credentials',
                'scope' => 'webapi usermanagement email_send verification statement statistics payment',
                'client_id' => $config['client_id'],
                'client_secret' => $config['client_secret'],
                'terminal' => $config['terminal_id'],
            ]);

            // Проверяем, успешно ли получен токен
            if (!isset($tokenResponse['access_token'])) {
                return response()->json([
                    'resultCode' => '500',
                    'resultMessage' => 'Failed to retrieve Epay API token',
                ], 500);
            }

            $accessToken = $tokenResponse['access_token'];

            // Отправляем запрос в Epay API с токеном
            $url = "https://epay-api.homebank.kz/check-status/payment/transaction/{$invoiceId}";

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$accessToken}",
            ])->get($url);


            // Проверяем успешность запроса
            if (!$response->successful()) {
                return response()->json([
                    'resultCode' => '502',
                    'resultMessage' => 'Epay API request failed',
                ], 502);
            }

            $responseData = $response->json();

            // Проверяем успешность ответа
            if (!isset($responseData['resultCode']) || $responseData['resultCode'] !== '100') {
                return response()->json([
                    'resultCode' => '400',
                    'resultMessage' => 'Epay API returned unsuccessful response',
                ], 400);
            }

            // Извлекаем транзакционные данные
            $transaction = $responseData['transaction'];

            // Проверяем наличие нужных данных
            if (!isset($transaction['invoiceID'], $transaction['cardMask'], $transaction['issuer'], $transaction['cardID'])) {
                return response()->json([
                    'resultCode' => '400',
                    'resultMessage' => 'Missing required transaction fields',
                ], 400);
            }

            // Проверяем, существует ли запись с таким invoiceID
            $userCard = UserCard::where('invoiceID', $transaction['invoiceID'])->first();

            if ($userCard) {
                // Обновляем запись, если она найдена
                $userCard->update([
                    'cardMask' => $transaction['cardMask'],
                    'issuer' => $transaction['issuer'],
                    'cardID' => $transaction['cardID'],
                ]);
            } else {
                // Если записи нет, можно просто логировать или создать новую запись (если нужно)
            }

            return response()->json([
                'resultCode' => '100',
                'resultMessage' => 'SUCCESS',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'resultCode' => '500',
                'resultMessage' => 'Internal Server Error',
            ], 500);
        }
    }
}

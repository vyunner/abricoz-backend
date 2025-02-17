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
            // Логируем полученный запрос
            Log::info('Epay post_link response', ['data' => $request->all()]);

            $data = $request->input('data');

            // Проверяем, передан ли invoiceId
            if (!isset($data['invoiceId']) || empty($data['invoiceId'])) {
                return response()->json([
                    'resultCode'    => '400',
                    'resultMessage' => 'Missing invoiceId',
                ], 400);
            }

            $invoiceId = $data['invoiceId'];

            // Отправляем запрос в Epay API
            $url = "https://epay-api.homebank.kz/check-status/payment/transaction/{$invoiceId}";

            $response = Http::post($url);

            // Проверяем успешность запроса
            if (!$response->successful()) {
                Log::error('Epay API request failed', [
                    'invoiceId' => $invoiceId,
                    'status'    => $response->status(),
                    'body'      => $response->body(),
                ]);

                return response()->json([
                    'resultCode'    => '502',
                    'resultMessage' => 'Epay API request failed',
                ], 502);
            }

            $responseData = $response->json();

            // Проверяем успешность ответа
            if (!isset($responseData['resultCode']) || $responseData['resultCode'] !== '100') {
                Log::warning('Epay API returned unsuccessful response', [
                    'invoiceId' => $invoiceId,
                    'response'  => $responseData,
                ]);

                return response()->json([
                    'resultCode'    => '400',
                    'resultMessage' => 'Epay API returned unsuccessful response',
                    'data'          => $responseData,
                ], 400);
            }

            // Извлекаем транзакционные данные
            $transaction = $responseData['transaction'];

            // Проверяем наличие нужных данных
            if (!isset($transaction['invoiceID'], $transaction['cardMask'], $transaction['issuer'], $transaction['cardID'])) {
                return response()->json([
                    'resultCode'    => '400',
                    'resultMessage' => 'Missing required transaction fields',
                ], 400);
            }

            // Получаем user_id (предполагаем, что пользователь аутентифицирован)
            $userId = Auth::id(); // Или можно передавать user_id в запросе, если это внешний сервис

            // Создаём запись в таблице user_cards
            $userCard = UserCard::create([
                'user_id'   => $userId,
                'invoiceID' => $transaction['invoiceID'],
                'cardMask'  => $transaction['cardMask'],
                'issuer'    => $transaction['issuer'],
                'cardID'    => $transaction['cardID'],
            ]);

            Log::info('UserCard saved successfully', ['user_card' => $userCard]);

            return response()->json([
                'resultCode'    => '100',
                'resultMessage' => 'SUCCESS',
                'transaction'   => $transaction,
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error in EpaySaveCardSuccessController', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'resultCode'    => '500',
                'resultMessage' => 'Internal Server Error',
            ], 500);
        }
    }
}

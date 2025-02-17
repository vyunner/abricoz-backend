<?php

namespace App\Http\Controllers\UserCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryIndexRequest;
use App\Models\UserCard;
use App\Services\EpayService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

/**
 * @group UserCard
 */
class UserCardIndexController extends Controller
{
    protected EpayService $epayService;

    public function __construct(EpayService $epayService)
    {
        $this->epayService = $epayService;
    }

    /**
     * Получить список карт пользователя
     * @param SubCategoryIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(SubCategoryIndexRequest $request)
    {
        $user_id = $request->user()->id;

        // Получаем токен для Epay API
        $tokenResponse = $this->epayService->getToken([
            'grant_type' => 'client_credentials',
            'scope' => 'webapi usermanagement email_send verification statement statistics payment',
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
            'terminal' => $config['terminal_id'],
        ]);

        if (!isset($tokenResponse['access_token'])) {
            return response()->json([
                'resultCode' => '500',
                'resultMessage' => 'Failed to retrieve Epay API token',
            ], 500);
        }

        $accessToken = $tokenResponse['access_token'];

        // Получаем только записи пользователя, где cardID отсутствует (NULL)
        $userCardsWithoutCardID = UserCard::where('user_id', $user_id)
            ->whereNull('cardID')
            ->get();

        foreach ($userCardsWithoutCardID as $userCard) {
            $invoiceID = $userCard->invoiceID;

            // Делаем GET-запрос к Epay API
            $url = "https://epay-api.homebank.kz/check-status/payment/transaction/{$invoiceID}";
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$accessToken}",
            ])->get($url);

            if ($response->successful()) {
                $responseData = $response->json();

                if (isset($responseData['transaction'])) {
                    $transaction = $responseData['transaction'];

                    $cardID = !empty($transaction['cardID']) ? $transaction['cardID'] : null;
                    $cardMask = !empty($transaction['cardMask']) ? $transaction['cardMask'] : null;
                    $issuer = !empty($transaction['issuer']) ? $transaction['issuer'] : null;

                    // Обновляем UserCard
                    $userCard->update([
                        'cardID' => $cardID,
                        'cardMask' => $cardMask,
                        'issuer' => $issuer,
                    ]);
                }
            }
        }

        // Удаляем записи, у которых cardID все еще NULL и прошло больше 1 часа
        UserCard::where('user_id', $user_id)
            ->whereNull('cardID')
            ->where('created_at', '<', Carbon::now()->subHour())
            ->delete();

        // Получаем обновленный список карт, у которых есть cardID
        $updatedUserCards = UserCard::where('user_id', $user_id)
            ->whereNotNull('cardID')
            ->get()
            ->makeHidden(['cardID']);

        return $this->response($updatedUserCards, 'Список карт пользователя успешно загружен!');
    }
}

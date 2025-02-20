<?php

namespace App\Http\Controllers\UserCard;

use App\Http\Controllers\Controller;
use App\Models\UserCard;
use App\Services\EpayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * @group UserCard
 */
class UserCardDeleteController extends Controller
{
    protected EpayService $epayService;

    public function __construct(EpayService $epayService)
    {
        $this->epayService = $epayService;
    }

    /**
     * Удаление карты юзера
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $user_id = $request->user()->id;

        // Проверяем, существует ли карта и принадлежит ли она пользователю
        $userCard = UserCard::where('id', $id)->where('user_id', $user_id)->first();

        if (!$userCard) {
            return $this->response(null, 'Карта не найдена или не принадлежит вам.', 404);
        }

        $config = config('epay');

        $token = $this->epayService->getToken([
            'grant_type' => 'client_credentials',
            'scope' => 'webapi usermanagement email_send verification statement statistics payment',
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
        ]);

        $url = "https://epay-api.homebank.kz/card/deactivate/{$userCard->cardID}";
        Http::withHeaders([
            'Authorization' => "Bearer {$token['access_token']}",
        ])->post($url);

        // Удаляем карту
        $userCard->delete();

        // Возвращаем обновленный список карт пользователя
        $updatedUserCards = UserCard::where('user_id', $user_id)->get();

        return $this->response($updatedUserCards, 'Карта успешно удалена!');
    }
}

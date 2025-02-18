<?php

namespace App\Http\Controllers\UserCard;

use App\Http\Controllers\Controller;
use App\Models\UserCard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group UserCard
 */
class UserCardDeleteController extends Controller
{
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
            $this->response(null, 'Карта не найдена или не принадлежит вам.', 404);
        }

        // Удаляем карту
        $userCard->delete();

        // Возвращаем обновленный список карт пользователя
        $updatedUserCards = UserCard::where('user_id', $user_id)->get();

        return $this->response($updatedUserCards, 'Карта успешно удалена!');
    }
}

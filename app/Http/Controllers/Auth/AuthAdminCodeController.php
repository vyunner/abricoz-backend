<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthAdminCodeRequest;
use App\Interfaces\MobizonServiceInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

/**
 * @group Auth
 */
class AuthAdminCodeController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService
    )
    {
    }

    /**
     * Отправить код
     * @param AuthAdminCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthAdminCodeRequest $request)
    {
        $data = $request->validated();
         $code = mt_rand(100000, 999999);
//        $code = 123456;

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            return $this->response([], 'Пользователь не найден', 404);
        }

        if (!$user->roles()->where('id', 1)->exists()) {
            return $this->response([], 'У вас нет доступа', 403);
        }

        $user->update([
            'phone_verification_code' => $code,
            'phone_verification_code_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        $recipient = $data['phone'];
        $text = 'Спасибо за регистрацию на abricoz.kz! Ваш код подтверждения: ' . $code;

//         Отправка СМС
         $response = $this->mobizonService->sendSmsMessage($recipient, $text);

        $userData = $user->toArray();
        unset($userData['phone_verification_code']);

        return $this->response($userData, 'Код успешно отправлен!');
    }
}

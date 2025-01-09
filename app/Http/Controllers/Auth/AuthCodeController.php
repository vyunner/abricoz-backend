<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\MobizonServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthCodeRequest;
use App\Models\User;
use Carbon\Carbon;

/**
 * @group Auth
 */
class AuthCodeController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService
    )
    {
    }

    /**
     * Отправить код
     * @param AuthCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthCodeRequest $request)
    {
        $data = $request->validated();
        $code = mt_rand(100000, 999999);
//        $code = 123456;

        $user = User::updateOrCreate(
            ['phone' => $data['phone']],
            [
                'phone_verification_code' => $code,
                'phone_verification_code_expires_at' => Carbon::now()->addMinutes(5),
            ]
        );

        $recipient = $data['phone'];
        $text = 'Спасибо за регистрацию на abricoz.kz! Ваш код подтверждения: ' . $code;

        //TODO Работает!!! Отправка смс
         $response = $this->mobizonService->sendSmsMessage($recipient, $text);

        dd(env('MOBIZON_API_KEY'));

        $userData = $user->toArray();
        unset($userData['phone_verification_code']);

        return $this->response($userData, 'Аккаунт успешно зарегистрирован!');
    }
}

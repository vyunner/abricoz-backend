<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\MobizonService;
use Carbon\Carbon;

class AuthRegisterController extends Controller
{
    protected $mobizonService;

    public function __construct(MobizonService $mobizonService)
    {
        $this->mobizonService = $mobizonService;
    }

    public function __invoke(AuthRegisterRequest $request)
    {
        $data = $request->validated();
//        $code = mt_rand(100000, 999999);
        $code = 123456;

        $user = User::firstOrCreate([
            'phone' => $data['phone']
        ], [
            'phone_verification_code' => $code,
            'phone_verification_code_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        $recipient = $data['phone'];
        $text = 'Спасибо за регистрацию на glowbee.kz! Ваш код подтверждения: ' . $code;

        // Работает!!! Отправка смс
//        $response = $this->mobizonService->sendSmsMessage($recipient, $text);

        $userData = $user->toArray();
        unset($userData['phone_verification_code']);

        return $this->response($userData, 'Аккаунт успешно зарегистрирован!');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\AuthLoginRequest;

/**
 * @group Auth
 */
class AuthLoginController extends Controller
{
    /**
     * Авторизация
     * @param AuthLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthLoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where(['phone' => $data['phone']])->first();
        $user['roles'] = $user->getRoleNames();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->response(['user' => $user, 'token' => $token], 'Вы успешно вошли в аккаунт!');
    }
}

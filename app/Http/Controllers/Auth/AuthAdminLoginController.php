<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthAdminLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @group Auth
 */
class AuthAdminLoginController extends Controller
{
    /**
     * AuthAdminLogin
     * @param AuthAdminLoginRequest $request
     * @return mixed
     */
    public function __invoke(AuthAdminLoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where(['phone' => $data['phone']])->first();
        $user['roles'] = $user->getRoleNames();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->response(['user' => $user, 'token' => $token], 'Вы успешно вошли в аккаунт!');
    }
}

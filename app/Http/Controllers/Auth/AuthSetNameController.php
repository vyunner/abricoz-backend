<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthSetNameRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\Auth\AuthLoginRequest;

/**
 * @group Auth
 */
class AuthSetNameController extends Controller
{
    /**
     * SetName
     * @param AuthSetNameRequest $request
     * @return mixed
     */
    public function __invoke(AuthSetNameRequest $request)
    {
        $data = $request->validated();

        // Получаем текущего пользователя
        $user = $request->user();

        // Обновляем имя и фамилию пользователя
        $user->firstname = $data['firstname'] ?? $user->firstname;
        $user->lastname = $data['lastname'] ?? $user->lastname;

        $user->save();

        $user['roles'] = $user->getRoleNames();

        return $this->response(['user' => $user], 'Имя и фамилия успешно обновлены!');
    }
}

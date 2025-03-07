<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthSetNameRequest;

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

        $user = $request->user();

        $user->firstname = $data['firstname'] ?? $user->firstname;
        $user->lastname = $data['lastname'] ?? $user->lastname;

        if (!empty($data['email']) && $data['email'] !== $user->email) {
            $user->email = $data['email'];
        }

        $user->save();

        $user['roles'] = $user->getRoleNames();

        return $this->response(['user' => $user], 'Имя, фамилия и email успешно обновлены!');
    }
}

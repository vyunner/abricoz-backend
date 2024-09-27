<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminGetUserRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

/**
 * @group Admin
 */
class AdminGetUserController extends Controller
{
    /**
     * GetUser
     * @param AdminGetUserRequest $request
     * @return mixed
     */
    public function __invoke(AdminGetUserRequest $request)
    {
        $data = $request->validated();

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            return $this->response(null, 'Пользователь не найден', 404);
        }

        $user['roles'] = $user->getRoleNames();

        return $this->response($user, 'Пользователь успешно получен!');
    }
}

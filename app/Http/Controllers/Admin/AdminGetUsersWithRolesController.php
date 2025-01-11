<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * @group Admin
 */
class AdminGetUsersWithRolesController extends Controller
{
    /**
     * GetUsersWithRoles
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        // Получаем всех пользователей, у которых есть роли
        $users = User::whereHas('roles')
            ->with('roles')
            ->get();

        // Добавляем имена ролей к каждому пользователю
        $users->map(function($user){
            $user['roles'] = $user->getRoleNames();
            return $user;
        });

        return $this->response($users, 'Пользователи успешно получены!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminSetRolesRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * @group Admin
 */
class AdminSetRolesController extends Controller
{
    /**
     * SetRoles
     * @param AdminSetRolesRequest $request
     * @return mixed
     */
    public function __invoke(AdminSetRolesRequest $request)
    {
        $data = $request->validated();

        // Находим пользователя по ID
        $user = User::findOrFail($data['user_id']);

        // Получаем роли по их ID
        $roles = Role::whereIn('id', $data['roles_ids'])->get();

        // Синхронизируем роли пользователя
        $user->syncRoles($roles);

        return $this->response(null, 'Роли успешно обновлены!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * @group Admin
 */
class AdminGetRolesController extends Controller
{
    /**
     * GetRoles
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        // Получаем все роли с помощью пакета Spatie
        $roles = Role::all();

        return $this->response($roles, 'Роли успешно получены!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminSetRolesRequest;
use App\Http\Requests\Auth\AuthAdminCodeRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

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
        // $code = mt_rand(100000, 999999);
        $code = 123456;

        return $this->response($userData, 'Код успешно отправлен!');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $user->addresses()->delete();

        $user->delete();

        return $this->response(null, 'Ваш аккаунт был успешно удален.');
    }
}

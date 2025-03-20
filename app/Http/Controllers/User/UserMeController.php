<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMeController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $user['roles'] = $user->getRoleNames();

        return $user;
    }
}

<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Interfaces\MobizonServiceInterface;
use Illuminate\Http\Request;
use App\Models\User;

class PosAuthLoginController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService
    )
    {
    }

    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone' => ['required', 'exists:users,phone'],
            'code' => ['required']
        ]);

        $user = User::where('phone', $data['phone'])
            ->where('phone_verification_code', $data['code'])
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Код подтверждения неверен.'], 422);
        }

        $user['roles'] = $user->getRoleNames();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Вы успешно вошли в аккаунт!',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }
}

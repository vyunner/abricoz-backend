<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

final class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'exists:users,phone', 'regex:/^\+77\d{9}$/'],
            'otp' => ['required', 'digits:6'],
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user || $user->phone_verification_code != $request->otp) {
            return response()->json(['error' => 'Invalid OTP'], 422);
        }

        if (now()->greaterThan($user->phone_verification_code_expires_at)) {
            return response()->json(['error' => 'OTP expired'], 422);
        }

        auth('web')->login($user);

        return response()->json(['message' => 'Login successful', 'redirect' => route('dashboard')]);
    }
}

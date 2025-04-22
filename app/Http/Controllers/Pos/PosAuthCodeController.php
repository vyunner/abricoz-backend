<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Interfaces\MobizonServiceInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class PosAuthCodeController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService
    )
    {
    }

    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);

        $code = mt_rand(100000, 999999);
         $code = 123456; // тестовый код

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }

        if (!$user->roles()->whereIn('id', [1, 5])->exists()) {
            return response()->json(['message' => 'У вас нет доступа'], 403);
        }

        $user->update([
            'phone_verification_code' => $code,
            'phone_verification_code_expires_at' => now()->addMinutes(5),
        ]);

        $recipient = $data['phone'];
        $text = 'Спасибо за регистрацию на abricoz.kz! Ваш код подтверждения: ' . $code;

//        $this->mobizonService->sendSmsMessage($recipient, $text);

        return response()->json(['message' => 'Код отправлен']);
    }
}

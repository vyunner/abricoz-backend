<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Interfaces\MobizonServiceInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class SendCodeController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService,
    ) {
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'exists:users,phone', 'regex:/^\+77\d{9}$/'],
        ]);

        $phones = [
            '+77026207447',
            '+77022363206',
        ];

        if (false === in_array($request->phone, $phones)) {
            return response()->json(['error' => 'Invalid phone number'], 422);
        }

        $code = 100000;

        User::where('phone', $request->phone)->update([
            'phone_verification_code' => $code,
            'phone_verification_code_expires_at' => Carbon::now()->addMinutes(3),
        ]);

        $text = 'Ваш код подтверждения: ' . $code;

        // Send SMS
        // $response = $this->mobizonService->sendSmsMessage($request->phone, $text);
        // Log::info('Mobizon send sms', ['data' => $response]);

        return response()->json(['message' => 'OTP sent successfully']);
    }
}

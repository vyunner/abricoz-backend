<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\MobizonServiceInterface;
use App\Http\Requests\Auth\AuthCodeRequest;
use App\Models\User;
use Carbon\Carbon;

/**
 * @group Auth
 */
class AuthCodeController extends Controller
{
    public function __construct(
        protected MobizonServiceInterface $mobizonService,
    )
    {
    }

    /**
     * Отправить код
     * @param AuthCodeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(AuthCodeRequest $request)
    {
        $data = $request->validated();

        // На этот номер смс не отправляем
        if ($this->dontSendSms($data['phone'])) {
            $code = 123456;
        } else {
            $code = mt_rand(100000, 999999);
        }

        User::updateOrCreate(
            ['phone' => $data['phone']],
            [
                'phone_verification_code' => $code,
                'phone_verification_code_expires_at' => Carbon::now()->addMinutes(5),
            ]
        );

        $text = 'Спасибо за регистрацию на abricoz.kz! Ваш код подтверждения: ' . $code;

        // На этот номер смс не отправляем
        if ($this->dontSendSms($data['phone'])) {
            return response()->json([
                'code' => 0,
                'data' => [
                    'campaignId' => '',
                    'messageId' => '',
                    'status' => 2,
                ],
                'message' => $text,
            ]);
        }

        // Отправка смс
        $response = $this->mobizonService->sendSmsMessage($data['phone'], $text);

        return response()->json($response);
    }

    private function dontSendSms(string $phone): bool
    {
        return in_array($phone, [
            '+77714424343',
            '+77022363206',
        ]);
    }
}

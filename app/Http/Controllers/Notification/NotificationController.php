<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $firebaseNotificationService;

    public function __construct(FirebaseNotificationService $firebaseNotificationService)
    {
        $this->firebaseNotificationService = $firebaseNotificationService;
    }

    public function __invoke(Request $request)
    {
        try {
            $response = $this->firebaseNotificationService->sendNotification(
                'app2', // Идентификатор приложения ('app1' или 'app2')
                $request->input('fcm_token'), // Токен устройства получателя
                [
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'data' => [
                        'key1' => 'value1',
                        'key2' => 'value2',
                    ],
                ]
            );
            return($response);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}

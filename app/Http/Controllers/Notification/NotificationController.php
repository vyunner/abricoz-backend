<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            $path = config("firebase.credentials.app1");

            if (!file_exists($path)) {
                throw new \Exception("Firebase credentials file not found at: $path");
            }

            $jsonKey = json_decode(file_get_contents($path), true);

            if (!$jsonKey) {
                throw new \Exception("Invalid Firebase credentials file.");
            }

            return $jsonKey;

            $response = $this->firebaseNotificationService->sendNotification(
                strval($request->input('app1')), // Идентификатор приложения ('app1' или 'app2')
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
            return ($response);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return $e->getMessage();
        }
    }
}

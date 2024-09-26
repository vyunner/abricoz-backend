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
                'app1', // Идентификатор приложения ('app1' или 'app2')
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

<<<<<<< HEAD
        $result = $this->notificationService->sendNotification($fcmToken, $title, $body, $data);

        if ($result) {
            return response()->json(['message' => 'Уведомление успешно отправлено']);
        } else {
            \Log::error('Ошибка при отправке уведомления для токена: ' . $fcmToken);
            return response()->json(['message' => 'Ошибка при отправке уведомления'], 500);
=======
            // Обработка успешного ответа
            dd($response);
        } catch (\Exception $e) {
            // Обработка ошибок
            dd($e->getMessage());
>>>>>>> 1242a3c2c0fed2377ef7d3e97ea42b369ee6ac6f
        }
    }
}

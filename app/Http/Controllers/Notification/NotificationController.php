<?php

namespace App\Http\Controllers\Notification;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function __invoke(Request $request)
    {
        $fcmToken = $request->input('fcm_token');
        $title = $request->input('title');
        $body = $request->input('body');
        $data = $request->input('data', []);

        $result = $this->notificationService->sendNotification($fcmToken, $title, $body, $data);

        if ($result) {
            return response()->json(['message' => 'Уведомление успешно отправлено']);
        } else {
            return response()->json(['message' => 'Ошибка при отправке уведомления'], 500);
        }
    }
}

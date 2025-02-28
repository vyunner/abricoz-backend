<?php

namespace App\Http\Controllers\UserDevice;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDevice\UserDeviceStoreRequest;
use App\Models\UserDevice;
use Illuminate\Database\QueryException;

/**
 * @group UserDevice
 */
class UserDeviceStoreController extends Controller
{
    /**
     * Создание
     * @param UserDeviceStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UserDeviceStoreRequest $request)
    {
        $validatedData = $request->validated();
        $user_id = $request->user()->id;
        $device_id = $validatedData['device_id'];
        $fcm_token_type_id = $validatedData['fcm_token_type_id'];
        $fcm_token = $validatedData['fcm_token'];

        // Проверяем, существует ли уже такая запись
        $existingDevice = UserDevice::where('fcm_token', $fcm_token)
            ->where('device_id', $device_id)
            ->where('user_id', $user_id)
            ->where('fcm_token_type_id', $fcm_token_type_id)
            ->first();

        if ($existingDevice) {
            // Если запись уже существует, просто возвращаем её без изменений
            return $this->response($existingDevice, 'Устройство уже зарегистрировано');
        }

        UserDevice::where('fcm_token', $fcm_token)->delete();

        try {
            // Создаем новую запись
            $newDevice = UserDevice::create([
                'user_id' => $user_id,
                'fcm_token_type_id' => $fcm_token_type_id,
                'fcm_token' => $fcm_token,
                'device_id' => $device_id,
            ]);

            return $this->response($newDevice, 'Запись успешно создана');

        } catch (QueryException $e) {
            return $this->response(null, 'Ошибка: Дубликат FCM-токена', 400);
        }
    }
}

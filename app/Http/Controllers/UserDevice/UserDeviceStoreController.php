<?php

namespace App\Http\Controllers\UserDevice;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDevice\UserDeviceStoreRequest;
use App\Models\UserDevice;

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

        // Проверяем, существует ли уже эта запись
        $existingDevice = UserDevice::where('fcm_token', $fcm_token)->first();

        if ($existingDevice) {
            if ($existingDevice->device_id === $device_id && $existingDevice->user_id === $user_id) {
                // Если устройство уже зарегистрировано для этого пользователя, возвращаем его
                return $this->response($existingDevice, 'Устройство уже зарегистрировано');
            } else {
                // Если токен есть, но с другим устройством — удаляем старую запись
                $existingDevice->delete();
            }
        }

        // Создаем новую запись
        $newDevice = UserDevice::create([
            'user_id' => $user_id,
            'fcm_token_type_id' => $fcm_token_type_id,
            'fcm_token' => $fcm_token,
            'device_id' => $device_id,
        ]);

        return $this->response($newDevice, 'Запись успешно создана');
    }
}

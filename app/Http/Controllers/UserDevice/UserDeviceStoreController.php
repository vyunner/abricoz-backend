<?php

namespace App\Http\Controllers\UserDevice;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Http\Requests\UserDevice\UserDeviceStoreRequest;
use App\Models\SubCategory;
use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group UserDevice
 */
class UserDeviceStoreController extends Controller
{
    /**
     * Создание
     * @param SubCategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UserDeviceStoreRequest $request)
    {
        $validatedData = $request->validated();

        $user_id = $request->user()->id;
        $device_id = $validatedData['device_id']; // Предполагается, что device_id присутствует в запросе

        // Ищем устройство по device_id
        $userDevice = UserDevice::where('device_id', $device_id)->first();

        if ($userDevice) {
            // Если устройство найдено, обновляем fcm_token
            $userDevice->update([
                'fcm_token' => $validatedData['fcm_token'],
                'user_id' => $user_id, // Возможно, вы захотите обновить и user_id
            ]);

            $message = 'FCM токен успешно обновлен!';
        } else {
            // Если устройство не найдено, создаем новую запись
            $userDevice = UserDevice::create([
                'user_id' => $user_id,
                'device_id' => $device_id,
                'fcm_token' => $validatedData['fcm_token'],
                // Добавьте другие поля, если они есть
            ]);

            $message = 'Устройство успешно зарегистрировано!';
        }

        return $this->response($userDevice, $message);
    }
}

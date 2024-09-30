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
        $device_id = $validatedData['device_id'];

        // Ищем устройство по device_id
        $userDevice = UserDevice::where('device_id', $device_id)->first();

        if ($userDevice) {
            // Если устройство найдено, обновляем fcm_token и/или staff_fcm_token
            $updateData = [
                'user_id' => $user_id, // Возможно, требуется обновление user_id
            ];

            if (!empty($validatedData['fcm_token'])) {
                $updateData['fcm_token'] = $validatedData['fcm_token'];
            }

            if (!empty($validatedData['staff_fcm_token'])) {
                $updateData['staff_fcm_token'] = $validatedData['staff_fcm_token'];
            }

            $userDevice->update($updateData);
            $message = 'Данные устройства успешно обновлены!';
        } else {
            // Если устройство не найдено, создаем новую запись
            $userDevice = UserDevice::create([
                'user_id' => $user_id,
                'device_id' => $device_id,
                'fcm_token' => $validatedData['fcm_token'] ?? null,
                'staff_fcm_token' => $validatedData['staff_fcm_token'] ?? null,
            ]);

            $message = 'Устройство успешно зарегистрировано!';
        }

        return $this->response($userDevice, $message);
    }
}

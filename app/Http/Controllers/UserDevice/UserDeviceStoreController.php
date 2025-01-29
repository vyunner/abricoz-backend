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
        $fcm_token_type_id = $validatedData['fcm_token_type_id'];
        $fcm_token = $validatedData['fcm_token'];

        // Проверяем, существует ли идентичная запись
        $existingDevice = UserDevice::where('device_id', $device_id)
            ->where('fcm_token_type_id', $fcm_token_type_id)
            ->where('fcm_token', $fcm_token)
            ->first();

        if ($existingDevice) {
            if ($existingDevice->user_id === $user_id) {
                // Если идентичная запись уже существует, ничего не делаем
                return $this->response($existingDevice, 'Запись уже существует');
            } else {
                // Если device_id, fcm_token, fcm_token_type_id совпадают, но user_id разные, удаляем старую запись
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

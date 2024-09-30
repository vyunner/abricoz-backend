<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Http\Requests\UserDevice\UserDeviceStoreRequest;
use App\Models\SubCategory;
use App\Models\UserDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Warehouseman
 */
class WarehousemanAcceptController extends Controller
{
    /**
     * Создание
     * @param SubCategoryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(UserDeviceStoreRequest $request)
    {
        $validatedData = $request->validated();

        return $this->response($userDevice, $message);
    }
}

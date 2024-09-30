<?php

namespace App\Http\Controllers\Warehouseman;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryStoreRequest;
use App\Http\Requests\UserDevice\UserDeviceStoreRequest;
use App\Http\Requests\Warehouseman\WarehousemanAcceptRequest;
use App\Models\OrderAssignment;
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
    public function __invoke(WarehousemanAcceptRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['role_id'] = 2;
        $validatedData['user_id'] = $request->user()->id;

        OrderAssignment::create($validatedData);
        return $this->response($userDevice, $message);
    }
}

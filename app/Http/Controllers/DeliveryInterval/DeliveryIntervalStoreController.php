<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalStoreRequest;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalStoreController extends Controller
{
    /**
     * Создание
     * @param DeliveryIntervalStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DeliveryIntervalStoreRequest $request)
    {
        $validatedData = $request->validated();

        $deliveryInterval = DeliveryInterval::create($validatedData);

        return $this->response($deliveryInterval, 'Временной интервал успешно создан!');
    }
}

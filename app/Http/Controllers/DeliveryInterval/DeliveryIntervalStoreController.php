<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalStoreRequest;
use App\Models\DeliveryInterval;

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
        $data = $request->validated();

        $delivery_interval = DeliveryInterval::create($data);

        return $this->response($delivery_interval, 'Временной интервал успешно создан!');
    }
}

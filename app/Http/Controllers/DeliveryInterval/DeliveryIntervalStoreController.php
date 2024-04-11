<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalStoreRequest;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

class DeliveryIntervalStoreController extends Controller
{
    public function __invoke(DeliveryIntervalStoreRequest $request)
    {
        $validatedData = $request->validated();

        $deliveryInterval = DeliveryInterval::create($validatedData);

        return $this->response($deliveryInterval, 'Временной интервал успешно создан!');
    }
}

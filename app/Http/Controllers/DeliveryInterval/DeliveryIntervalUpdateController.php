<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalUpdateRequest;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

class DeliveryIntervalUpdateController extends Controller
{
    public function __invoke(DeliveryIntervalUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $deliveryInterval = DeliveryInterval::findOrFail($id);

        $deliveryInterval->update($validatedData);

        return $this->response([], 'Данные временного интервала успешно изменены!');
    }
}

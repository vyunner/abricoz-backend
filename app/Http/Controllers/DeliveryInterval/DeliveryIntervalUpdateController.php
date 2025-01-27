<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalUpdateRequest;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalUpdateController extends Controller
{
    /**
     * Обновление
     * @param DeliveryIntervalUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DeliveryIntervalUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $delivery_interval = DeliveryInterval::findOrFail($id);

        $delivery_interval->fill($data)->save();

        return $this->response($delivery_interval, 'Данные временного интервала успешно изменены!');
    }
}

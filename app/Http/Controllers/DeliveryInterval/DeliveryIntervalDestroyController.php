<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInterval;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalDestroyController extends Controller
{
    /**
     * Удаление
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id)
    {
        $delivery_interval = DeliveryInterval::findOrFail($id);
        $delivery_interval->delete();

        return $this->response([], 'Временной интервал успешно удален!');
    }
}

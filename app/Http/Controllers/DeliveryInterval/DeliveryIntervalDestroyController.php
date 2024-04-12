<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $deliveryInterval = DeliveryInterval::findOrFail($id);
        $deliveryInterval->delete();

        return $this->response([], 'Временной интервал успешно удален!');
    }
}

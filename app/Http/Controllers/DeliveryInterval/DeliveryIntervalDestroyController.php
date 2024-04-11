<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

class DeliveryIntervalDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $deliveryInterval = DeliveryInterval::findOrFail($id);
        $deliveryInterval->delete();

        return $this->response([], 'Временной интервал успешно удален!');
    }
}

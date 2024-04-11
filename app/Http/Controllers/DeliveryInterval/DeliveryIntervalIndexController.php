<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;

class DeliveryIntervalIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return $this->response(DeliveryInterval::all(), 'Список временных интервалов успешно загружен!');
    }
}

<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryInterval\DeliveryIntervalIndexRequest;
use App\Models\DeliveryInterval;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalIndexController extends Controller
{
    /**
     * Список
     * @param DeliveryIntervalIndexRequest $request
     * @return mixed
     */
    public function __invoke(DeliveryIntervalIndexRequest $request)
    {
        $current_time = Carbon::now();
        $intervals = DeliveryInterval::all();

        $available_intervals = $intervals->filter(function ($interval) use ($current_time) {
            $time_range = explode(' - ', $interval->name);
            $start_time = Carbon::createFromFormat('H:i', $time_range[0]);
            $end_time = Carbon::createFromFormat('H:i', $time_range[1]);

            // Exclude intervals that have already passed or are within the current time
            return $current_time->lt($start_time);
        });

        return $this->response([
            'delivery_intervals' => $available_intervals->values(),
            'current_time' => $current_time->toDateTimeString()
        ], 'Список временных интервалов успешно загружен!');
    }
}

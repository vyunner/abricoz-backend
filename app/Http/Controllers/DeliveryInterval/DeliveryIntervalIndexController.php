<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $current_time = Carbon::now();
        $intervals = DeliveryInterval::all();

        foreach ($intervals as $interval) {
            $time_range = explode(' - ', $interval->name);
            $start_time = Carbon::createFromFormat('H:i', $time_range[0]);
            $end_time = Carbon::createFromFormat('H:i', $time_range[1]);

            if ($current_time->between($start_time, $end_time)) {
                $interval->is_active = 0;
                $interval->save();
            }
        }

        $active_intervals = DeliveryInterval::where('is_active', 1)->get();

        return response()->json([
            'message' => 'Список временных интервалов успешно загружен!',
            'data' => $active_intervals,
            'current_time' => $current_time->toDateTimeString()
        ]);
    }
}

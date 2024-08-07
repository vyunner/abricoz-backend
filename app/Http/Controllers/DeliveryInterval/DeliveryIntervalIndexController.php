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
        $currentTime = Carbon::now()->format('H:i');
        $intervals = DeliveryInterval::all();

        foreach ($intervals as $interval) {
            if ($this->isCurrentTimeWithinInterval($currentTime, $interval->name)) {
                $interval->is_active = 0;
                $interval->save();
            }
        }

        $activeIntervals = DeliveryInterval::where('is_active', 1)->get();

        return response()->json([
            'message' => 'Список временных интервалов успешно загружен!',
            'data' => $activeIntervals,
            'current_time' => Carbon::now()->toDateTimeString()
        ]);
    }

    private function isCurrentTimeWithinInterval($currentTime, $intervalName)
    {
        list($start, $end) = explode('-', $intervalName);

        return $currentTime >= $start && $currentTime <= $end;
    }
}

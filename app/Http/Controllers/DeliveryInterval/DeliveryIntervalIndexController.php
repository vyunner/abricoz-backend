<?php

namespace App\Http\Controllers\DeliveryInterval;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInterval;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group DeliveryInterval
 */
class DeliveryIntervalIndexController extends Controller
{
    /**
     * Список
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        $available_intervals = [];
        $current_time = now();
        return $current_time;
        $intervals = DeliveryInterval::all();

        $dates = [
            today()->addDays(1),
            today()->addDays(2),
            // Если текущее время больше 19:00, то вместо сегодняшнего дня дается на выбор после-после-завтра
            $current_time->copy()->format('H') > 19 ? today()->addDays(3) : today(),
        ];

        // Преобразование временных интервалов в отформатированный массив
        $intervals = $intervals->map(function ($interval) {
            // Попытка парсинга временных интервалов
            try {
                $time_range = explode(' - ', $interval->name);
            } catch (\Exception $e) {
                \Log::error('delivery_interval_incorrect_format', ['exception' => $e]);

                return $this->response(null, __('response.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return [
                'id' => $interval->id,
                'name' => $interval->name,
                'start_time' => $time_range[0],
                'end_time' => $time_range[1],
            ];
        });

        // Поиск доступных временных интервалов по датам
        foreach ($intervals as $interval) {
            foreach ($dates as $date) {
                $date = $date->format('Y-m-d');
                $start_datetime = Carbon::createFromFormat('Y-m-d H:i', $date . $interval['start_time']);

                if ($current_time->lessThan($start_datetime)) {
                    $available_intervals[$date][] = $interval;
                }
            }
        }

        return $this->response(
            [
                'delivery_intervals' => collect($available_intervals)->sortKeys()->toArray(),
                'current_time' => $current_time->toDateTimeString(),
            ],
            __('response.delivery_interval.success.index'),
        );
    }
}

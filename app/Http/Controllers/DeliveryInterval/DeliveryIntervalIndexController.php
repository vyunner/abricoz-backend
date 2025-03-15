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
        $onlyEvening = $current_time->format('H') < 12; // Проверяем, утро ли сейчас

        $intervals = DeliveryInterval::where('is_active', true)
            ->orderByRaw("STR_TO_DATE(SUBSTRING_INDEX(name, ' - ', 1), '%H:%i')")
            ->get();

        $dates = [
            today()->addDays(1),
            today()->addDays(2),
        ];

        // Преобразуем интервалы в удобный формат
        $intervals = $intervals->map(function ($interval) {
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

        // Фильтруем доступные интервалы
        foreach ($intervals as $interval) {
            foreach ($dates as $date) {
                $date = $date->format('Y-m-d');
                $start_datetime = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $interval['start_time']);

                if ($current_time->lessThan($start_datetime)) {
                    // Если сейчас утро, оставляем только вечерние интервалы
                    if ($onlyEvening && strtotime($interval['start_time']) < strtotime('18:00')) {
                        continue; // Пропускаем, если интервал раньше 18:00
                    }

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

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
        $current_date = today()->format('Y-m-d');
        $onlyEveningToday = $current_time->format('H') < 12; // Если время до 12:00, оставляем только вечерние интервалы

        $intervals = DeliveryInterval::where('is_active', true)
            ->orderByRaw("STR_TO_DATE(SUBSTRING_INDEX(name, ' - ', 1), '%H:%i')")
            ->get();

        $dates = [
            today(), // Добавляем текущий день
            today()->addDays(1),
            today()->addDays(2),
        ];

        // Преобразуем интервалы в удобный формат
        $intervals = $intervals->map(function ($interval) {
            try {
                $time_range = explode(' - ', $interval->name);
            } catch (\Exception $e) {
                \Log::error('delivery_interval_incorrect_format', ['exception' => $e]);
                return null;
            }

            return [
                'id' => $interval->id,
                'name' => $interval->name,
                'start_time' => $time_range[0],
                'end_time' => $time_range[1],
            ];
        })->filter(); // Убираем null-значения

        // Фильтруем доступные интервалы
        foreach ($intervals as $interval) {
            foreach ($dates as $date) {
                $dateFormatted = $date->format('Y-m-d');
                $start_datetime = Carbon::createFromFormat('Y-m-d H:i', $dateFormatted . ' ' . $interval['start_time']);

                if ($current_time->lessThan($start_datetime)) {
                    // Если сегодня и время до 12:00, оставляем только интервалы после 16:00
                    if ($onlyEveningToday && $dateFormatted === $current_date && strtotime($interval['start_time']) < strtotime('16:00')) {
                        continue; // Пропускаем дневные интервалы
                    }

                    // Если уже после 12:00, сегодняшние интервалы не выводим
                    if (!$onlyEveningToday && $dateFormatted === $current_date) {
                        continue;
                    }

                    $available_intervals[$dateFormatted][] = $interval;
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

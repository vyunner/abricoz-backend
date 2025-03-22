<?php

namespace App\Http\Controllers\Point;

use App\Http\Controllers\Controller;
use App\Http\Requests\Point\PointIndexRequest;
use App\Models\Point;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class PointIndexController extends Controller
{
    public function __invoke(PointIndexRequest $request)
    {
        $city_id = $request->input('city_id');

        if ($city_id == 'null') {
            $city_id = 1;
        }

        $points = Point::where(['city_id' => $city_id])->get();

        // Хардкодим список ключей здесь
        $apiKeys = [
            '45bb03fd-178d-490d-9690-a291edb07e9b', // Абыл
            '401e897c-fc82-4c23-92f2-0131246dcab2',
            'efc5ec46-1926-4edb-929d-15a0695dfeea',
            'b1976ce5-b527-438c-9baa-1540a2d0dbff', // Слава
            'b152ace9-dce3-4057-a9c6-160008deaf62', // Нурсаид
        ];

        // Получаем текущий индекс из кэша, по умолчанию 0
        $index = Cache::get('api_key_index', 0);

        // Берем текущий ключ
        $apiKey = $apiKeys[$index];

        // Считаем следующий индекс
        $nextIndex = ($index + 1) % count($apiKeys);
        Cache::put('api_key_index', $nextIndex);

        return response()->json([
            'data' => $points,
            'message' => 'Point успешнт загружены',
            'http_code' => 200,
            'status' => 'success',
            'api_key' => $apiKey
        ]);
    }
}

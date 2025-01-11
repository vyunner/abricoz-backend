<?php

namespace App\Http\Controllers\Point;

use App\Http\Controllers\Controller;
use App\Http\Requests\Point\PointIndexRequest;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

class PointIndexController extends Controller
{
    public function __invoke(PointIndexRequest $request)
    {
        $city_id = $request->input('city_id');

        return $this->response(Point::where(['city_id' => $city_id])->get(), 'Point успешнт загружены');
    }
}

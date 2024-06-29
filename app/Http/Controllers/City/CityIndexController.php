<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * @group City
 */
class CityIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $cities = City::all();

        return $this->response($cities, 'Баннеры успешно загружены!');
    }
}

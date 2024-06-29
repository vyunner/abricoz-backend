<?php

namespace App\Http\Controllers\Banner;

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
        $districts = City::all();

        return $this->response($districts, 'Баннеры успешно загружены!');
    }
}

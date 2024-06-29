<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

/**
 * @group District
 */
class DistrictIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $districts = District::all();

        return $this->response($districts, 'Баннеры успешно загружены!');
    }
}

<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Country;

class WarehouseGetCountriesController extends Controller
{
    public function __invoke()
    {
        $countries = Country::all();

        return $this->response($countries, 'Countries retrieved successfully');
    }
}

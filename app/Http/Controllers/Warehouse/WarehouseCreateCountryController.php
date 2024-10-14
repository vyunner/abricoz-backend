<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\Warehouse\WarehouseCreateCountryRequest;

class WarehouseCreateCountryController extends Controller
{
    public function __invoke(WarehouseCreateCountryRequest $request)
    {
        $country = Country::create($request->validated());

        return $this->response($country, 'Country created successfully');
    }
}

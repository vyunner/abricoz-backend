<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Country;

class WarehouseDeleteCountryController extends Controller
{
    public function __invoke($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return $this->response(null, 'Country deleted successfully');
    }
}

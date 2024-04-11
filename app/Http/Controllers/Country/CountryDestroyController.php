<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryDestroyController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return $this->response([], 'Страна успешно удалена!');
    }
}

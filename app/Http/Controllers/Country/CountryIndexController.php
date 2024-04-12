<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $countries = Country::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $countries->currentPage(),
                'countries' => $countries->items(),
                'total' => $countries->total(),
            ], 'Список стран успешно загружен!');
        }

        return $this->response(Country::all(), 'Список стран успешно загружен!');
    }
}

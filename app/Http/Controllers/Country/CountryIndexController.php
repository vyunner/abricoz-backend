<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryIndexRequest;
use App\Models\Country;
use Illuminate\Http\Request;

/**
 * @group Country
 */
class CountryIndexController extends Controller
{
    /**
     * Список
     * @param CountryIndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CountryIndexRequest $request)
    {
        if ($request->has('perPage')) {
            $perPage = $request->query('perPage', 10);
            $page = $request->query('page', 1);

            $countries = Country::paginate($perPage, ['*'], 'page', $page);

            return $this->response([
                'current_page' => $countries->currentPage(),
                'total' => $countries->total(),
                'countries' => $countries->items(),
            ], 'Список стран успешно загружен!');
        }

        return $this->response(Country::all(), 'Список стран успешно загружен!');
    }
}

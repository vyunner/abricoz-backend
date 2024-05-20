<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

/**
 * @group Country
 */
class CountryStoreController extends Controller
{
    /**
     * Создание
     * @param CountryStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CountryStoreRequest $request)
    {
        $validatedData = $request->validated();

        $country = Country::create($validatedData);

        return $this->response($country, 'Страна успешно создана!');
    }
}

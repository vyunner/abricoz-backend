<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

/**
 * @group Country
 */
class CountryUpdateController extends Controller
{
    /**
     * Обновление
     * @param CountryUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CountryUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $country = Country::findOrFail($id);

        $country->update($validatedData);

        return $this->response([], 'Данные страны успешно изменены!');
    }
}

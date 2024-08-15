<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\Request;

/**
 * @group Address
 */
class AddressUpdateController extends Controller
{
    /**
     * Обновление
     * @param AddressUpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function __invoke(AddressUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        $address = Address::findOrFail($id);

        $address->fill($validatedData)->save();

        return $this->response(['address' => $address], 'Адресс успешно изменен!');
    }
}

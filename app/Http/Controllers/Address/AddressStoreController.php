<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressStoreRequest;
use App\Models\Address;
use Illuminate\Http\Request;

/**
 * @group Address
 */
class AddressStoreController extends Controller
{
    /**
     * Создание
     * @param AddressStoreRequest $request
     * @return mixed
     */
    public function __invoke(AddressStoreRequest $request)
    {
        $validatedData = $request->validated();

        $address = Address::create($validatedData);

        return $this->response(['address' => $address], 'Адресс успешно создан!');
    }
}

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

        $user_id = $request->user()->id;
        $validatedData['user_id'] = $user_id;

        // Приводим пустые значения к пустой строке
        foreach (['address_apartment', 'address_entrance', 'address_floor', 'address_comment'] as $field) {
            if (empty($validatedData[$field])) {
                $validatedData[$field] = '';
            }
        }

        $address = Address::create($validatedData);

        return $this->response(['address' => $address], 'Адрес успешно создан!');
    }
}

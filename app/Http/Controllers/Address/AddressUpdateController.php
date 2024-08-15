<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

        // Проверка на соответствие user_id
        if ($address->user_id !== $request->user()->id) {
            return $this->response([], 'У вас нет прав для изменения этого адреса.', 403);
        }

        $address->fill($validatedData)->save();

        return $this->response(['address' => $address], 'Адресс успешно изменен!');
    }
}

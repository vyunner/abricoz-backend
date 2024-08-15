<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

/**
 * @group Address
 */
class AddressDestroyController extends Controller
{
    /**
     * Удаление
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function __invoke(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->delete();

        return $this->response([], 'Адресс успешно удален!');
    }
}

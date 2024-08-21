<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

        // Проверка на соответствие user_id
        if ($address->user_id !== $request->user()->id) {
            return $this->response([], 'У вас нет прав для удаления этого адреса.', 403);
        }

        $address->delete();

        return $this->response([], 'Адресс успешно удален!');
    }
}

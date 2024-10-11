<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

/**
 * @group Address
 */
class   AddressIndexController extends Controller
{
    /**
     * Список
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $user_id = $request->user()->id;

        $addresses = Address::where('user_id', $user_id)->get();

        return $this->response(['addresses' => $addresses], 'Список адрессов успешно загружен!');
    }
}

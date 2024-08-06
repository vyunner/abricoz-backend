<?php

namespace App\Http\Controllers\Robokassa;

use App\Http\Controllers\Controller;
use App\Models\RobokassaJson;
use Illuminate\Http\Request;


/**
 * @group Robokassa
 */
class RobokassaFailController extends Controller
{
    /**
     * Fail
     * @param Request $request
     * @return Request
     */
    public function __invoke(Request $request)
    {
        $data = $request->all();
        RobokassaJson::create(['data' => $data]);
    }
}

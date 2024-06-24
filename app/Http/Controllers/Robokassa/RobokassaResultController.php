<?php

namespace App\Http\Controllers\Robokassa;

use App\Http\Controllers\Controller;
use App\Models\RobokassaJson;
use Illuminate\Http\Request;


/**
 * @group Robokassa
 */
class RobokassaResultController extends Controller
{
    /**
     * Result
     * @param Request $request
     * @return Request
     */
    public function __invoke(Request $request)
    {
        RobokassaJson::create(['data' => $request->all()]);

        return $this->response([], 'Заказ успешно создан!');
    }
}

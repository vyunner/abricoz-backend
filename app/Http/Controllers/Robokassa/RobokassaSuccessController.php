<?php

namespace App\Http\Controllers\Robokassa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * @group Robokassa
 */
class RobokassaSuccessController extends Controller
{
    /**
     * Success
     * @param Request $request
     * @return Request
     */
    public function __invoke(Request $request)
    {
        return $request;
        return $this->response($request, 'Заказ успешно создан!');
    }
}

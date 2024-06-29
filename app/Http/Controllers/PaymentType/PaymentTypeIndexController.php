<?php

namespace App\Http\Controllers\PaymentType;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderShowRequest;
use App\Models\Order;
use App\Models\PaymentType;
use Illuminate\Http\Request;

/**
 * @group PaymentType
 */
class PaymentTypeIndexController extends Controller
{
    /**
     * Index
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $paymentTypes = PaymentType::all();
        return $this->response($paymentTypes, 'Список способов оплаты успешно отображен!');
    }
}

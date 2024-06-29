<?php

namespace App\Http\Controllers\Robokassa;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\RobokassaJson;
use Illuminate\Http\Request;


/**
 * @group Robokassa
 */
class RobokassaGetUrlController extends Controller
{
    /**
     * Ссылка
     * @param Request $request
     * @return Request
     */
    public function __invoke(Request $request)
    {
        $user_id = $request->user()->id;

        $lastOrder = Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->with('orderProducts.product')
            ->first();

        if (!$lastOrder) {
            return response()->json(['message' => 'No orders found'], 404);
        }

        $merchantLogin = 'Giowbee';

        $outSum = (string)$lastOrder->total_price;

        $invoiceId = (string)($lastOrder->id * 1000000);

        $description = $lastOrder->orderProducts->map(function ($orderProduct) {
            return $orderProduct->product->name_ru . ' (' . $orderProduct->product_quantity . ')';
        })->implode(', ');

        $mrhPass1 = 'STI21j3p5KT4FsIWUToK';

        $signatureValue = md5($merchantLogin . ':' . $outSum . ':' . $invoiceId . ':' . $mrhPass1);

        return $this->response(['robokassa_url' => `https://auth.robokassa.kz/Merchant/Index.aspx?MerchantLogin=$merchantLogin&OutSum=$outSum&InvoiceID=$invoiceId&Description=$description&SignatureValue=$signatureValue`], 'Ссылка успешно сгенерирована!');
    }
}

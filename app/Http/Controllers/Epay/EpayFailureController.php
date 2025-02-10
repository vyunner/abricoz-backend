<?php

namespace App\Http\Controllers\Epay;

use App\Enums\OrderPaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use App\Services\EpayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @group Epay
 */
class EpayFailureController extends Controller
{
    public function __construct(
        protected EpayService $epay_service,
    ) {
    }

    /**
     * Успешная оплата через Epay
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        Log::error('Epay failure_post_link response', ['data' => $request->all()]);

        /**
         * EXAMPLE:
         * 
         * "accountId": "7026207447",
         * "amount": 0,
         * "approvalCode": null,
         * "cardId": null,
         * "cardMask": "552204...6736",
         * "cardType": "MasterCard",
         * "code": "ok",
         * "currency": "KZT",
         * "dateTime": "2025-02-07T23:32:53.089532914+05:00",
         * "description": "Оплата+заказа+#12-1738952601",
         * "email": "sayat.kaldarbekov.00@gmail.com",
         * "id": "b79d53ee-6120-4cc9-85e1-fbab4b007aac",
         * "invoiceId": "12-1738952601",
         * "ip": "85.117.125.131",
         * "ipCity": null,
         * "ipCountry": null,
         * "ipDistrict": null,
         * "ipLatitude": 0,
         * "ipLongitude": 0,
         * "ipRegion": null,
         * "issuer": "HALYK BANK",
         * "issuerBankCountry": null,
         * "language": "RUS",
         * "name": "SAYAT KALDARBEKOV",
         * "phone": null,
         * "reason": "success",
         * "reasonCode": 0,
         * "reference": null,
         * "secure": "no",
         * "secureDetails": null,
         * "terminal": "d9d7978c-d6ee-4ec0-8cda-165251a4bf16"
         */
        $request->validate([
            'accountId' => ['string'],
            'amount' => ['int'],
            'approvalCode' => ['nullable'],
            'cardId' => ['nullable'],
            'cardMask' => ['string'],
            'cardType' => ['string'],
            'code' => ['string'],
            'currency' => ['string'],
            'dateTime' => ['string'],
            'description' => ['string'],
            'email' => ['string'],
            'id' => ['string'],
            'invoiceId' => ['required', 'string'],
            'ip' => ['string'],
            'ipCity' => ['nullable'],
            'ipCountry' => ['nullable'],
            'ipDistrict' => ['nullable'],
            'ipLatitude' => ['int'],
            'ipLongitude' => ['int'],
            'ipRegion' => ['nullable'],
            'issuer' => ['string'],
            'issuerBankCountry' => ['nullable'],
            'language' => ['string'],
            'name' => ['string'],
            'phone' => ['nullable'],
            'reason' => ['string'],
            'reasonCode' => ['int'],
            'reference' => ['nullable'],
            'secure' => ['string'],
            'secureDetails' => ['nullable'],
            'terminal' => ['string'],
        ]);

        $order_payment = OrderPayment::with('order')
            ->where('invoice_id', $request->invoiceId)
            ->first();

        if (isset($order_payment)) {
            $order_payment->status = OrderPaymentStatus::FAIL;
            $order_payment->save();
        }

        return $this->response(null, __('response.epay.failure'));
    }
}

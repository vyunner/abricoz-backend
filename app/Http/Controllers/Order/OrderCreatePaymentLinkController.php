<?php

namespace App\Http\Controllers\Order;

use App\Enums\OrderPaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Services\EpayService;
use Illuminate\Support\Facades\Log;

/**
 * @group Order
 */
class OrderCreatePaymentLinkController extends Controller
{
    public function __construct(
        protected EpayService $epay_service,
    ) {
    }

    /**
     * Оплата заказа
     * 
     * @param int $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $order_id)
    {
        $order = Order::findOrFail($order_id);

        $invoice_id = $order->id . '-' . time();

        $payment_data = $this->epay_service->createInvoice($invoice_id, $order->total_price);

        Log::info('Epay create payment link', ['data' => $payment_data]);

        OrderPayment::create([
            'order_id' => $order->id,
            'invoice_id' => $payment_data['invoice_id'],
            'epay_id' => $payment_data['id'],
            'amount' => $payment_data['amount'],
            'description' => $payment_data['description'],
            'status' => OrderPaymentStatus::ACTIVE,
        ]);

        return $this->response([
            'invoice_url' => $payment_data['invoice_url'],
        ], __('response.payment.link.create'));
    }
}

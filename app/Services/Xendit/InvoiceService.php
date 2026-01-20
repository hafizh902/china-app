<?php

namespace App\Services\Xendit;

use App\Models\Order;
use Xendit\Invoice\Invoice;

class InvoiceService
{
    public static function create(Order $order): Invoice
    {
        $api = XenditClient::invoiceApi();

        return $api->createInvoice([
            'external_id' => $order->order_number,
            'amount' => (int) $order->total,
            'description' => 'Order #' . $order->order_number,

            'customer' => [
                'given_names' => $order->customer_name,
                'email' => $order->customer_email,
                'mobile_number' => $order->customer_phone,
            ],

            'success_redirect_url' => route('orders'),
            'failure_redirect_url' => route('orders'),
            'currency' => 'IDR',
        ]);
    }
}

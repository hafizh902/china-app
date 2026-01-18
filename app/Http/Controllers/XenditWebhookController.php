<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class XenditWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        // 1. Validasi token (INI SUDAH BENAR)
        $incomingToken = $request->header('X-CALLBACK-TOKEN');

        if (! hash_equals(
            (string) config('services.xendit.webhook_token'),
            (string) $incomingToken
        )) {
            return response('Invalid token', 401);
        }


        // 2. Ambil payload
        $payload = $request->all();

        /**
         * SUPPORT:
         * - Invoice v1 (status di root)
         * - Invoice v2 (event + data)
         */

        // ===== V2 =====
        if (isset($payload['event'], $payload['data'])) {
            if ($payload['event'] !== 'invoice.paid') {
                return response('Ignored', 200);
            }

            $invoice = $payload['data'];
        }
        // ===== V1 =====
        else {
            if (($payload['status'] ?? null) !== 'PAID') {
                return response('Ignored', 200);
            }

            $invoice = $payload;
        }

        // 3. Cari order
        $order = \App\Models\Order::where(
            'xendit_invoice_id',
            $invoice['id']
        )->first();

        if (! $order) {
            return response('Order not found', 404);
        }

        // 4. Update order
        $order->update([
            'payment_status' => 'paid',
            'status' => 'preparing',
            'payment_method' => $invoice['payment_method'] ?? 'xendit',
        ]);

        return response('OK', 200);
    }
}

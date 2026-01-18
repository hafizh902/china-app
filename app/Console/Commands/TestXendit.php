<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Xendit\XenditClient;

class TestXendit extends Command
{
    protected $signature = 'xendit:test';
    protected $description = 'Test Xendit SDK v7 connection';

    public function handle()
    {
        try {
            $api = XenditClient::invoiceApi();

            $invoice = $api->createInvoice([
                'external_id' => 'TEST-' . now()->timestamp,
                'amount' => 10000,
                'description' => 'Test Invoice',
            ]);

            $this->info('Xendit OK');
            $this->line('Invoice ID: ' . $invoice['id']);
            $this->line('Invoice URL: ' . $invoice['invoice_url']);

        } catch (\Throwable $e) {
            $this->error('Xendit ERROR');
            $this->error($e->getMessage());
        }
    }
}

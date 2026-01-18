<?php

namespace App\Services\Xendit;

use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

class XenditClient
{
    public static function invoiceApi(): InvoiceApi
    {
        Configuration::setXenditKey(config('xendit.secret_key'));
        return new InvoiceApi();
    }
}

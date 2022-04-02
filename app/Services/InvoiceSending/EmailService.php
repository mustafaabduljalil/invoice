<?php

namespace App\Services\InvoiceSending;

use App\Interfaces\SendInvoiceInterface;
use App\Jobs\SendInvoiceEmailJob;

class EmailService implements SendInvoiceInterface
{
    public function excute($clientInvoice): void
    {
        dispatch(new SendInvoiceEmailJob($clientInvoice));
    }
}

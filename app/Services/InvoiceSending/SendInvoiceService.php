<?php

namespace App\Services\InvoiceSending;

use App\Interfaces\SendInvoiceInterface;
use App\Jobs\SendInvoiceEmailJob;
use App\Services\ClientService;

class SendInvoiceService implements SendInvoiceInterface
{
    public function excute($clientInvoice): void
    {
        switch ($clientInvoice->preferred_communication_channel){
            case config('communication_channels.SMS_COMMUNICATION_CHANNEL'):
                (new SMSService())->excute($clientInvoice);
                break;
            default:
                (new EmailService())->excute($clientInvoice);
                break;
        }
    }
}

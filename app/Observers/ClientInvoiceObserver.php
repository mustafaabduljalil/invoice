<?php

namespace App\Observers;

use App\Models\ClientInvoice;
use App\Services\InvoiceSending\SendInvoiceService;

class ClientInvoiceObserver
{
    /**
     * Handle the ClientInvoice "created" event.
     *
     * @param  \App\Models\ClientInvoice  $clientInvoice
     * @return void
     */
    public function created(ClientInvoice $clientInvoice)
    {
        $clientInvoice = ClientInvoice::with('client')
                            ->where('id', $clientInvoice->id)->first();
        (new SendInvoiceService())->excute($clientInvoice);
    }
}

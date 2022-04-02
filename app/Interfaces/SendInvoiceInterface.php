<?php

namespace App\Interfaces;

interface SendInvoiceInterface
{
    public function excute($clientInvoice):void;
}

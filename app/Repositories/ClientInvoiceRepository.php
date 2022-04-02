<?php

namespace App\Repositories;

use App\Models\ClientInvoice;

class ClientInvoiceRepository
{
    protected $clientInvoice;

    public function __construct(ClientInvoice $clientInvoice)
    {
        $this->clientInvoice = $clientInvoice;
    }

    /**
     * Store new clientInvoice.
     *
     * @return \App\Models\ClientInvoice $clientInvoice
     */
    public function store($data)
    {
        return $this->clientInvoice->create($data);
    }

}

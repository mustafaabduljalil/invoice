<?php


namespace App\Services;

use App\Interfaces\BaseModelInterface;
use App\Repositories\ClientInvoiceRepository;

class ClientInvoiceService implements BaseModelInterface
{
    public $clientInvoiceRepository, $clientService;

    public function __construct(ClientInvoiceRepository $clientInvoiceRepository, ClientService $clientService)
    {
        $this->clientInvoiceRepository = $clientInvoiceRepository;
        $this->clientService = $clientService;
    }

    /**
     * Store new clientInvoice.
     *
     * @return \App\Models\ClientInvoice $clientInvoice
     */
    public function store($data):object
    {
        $data['client_id'] = $this->clientService->getClientOrCreate($data)->id;
        return $this->clientInvoiceRepository->store($data);
    }
}

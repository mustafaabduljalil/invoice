<?php


namespace App\Services;

use App\Interfaces\BaseModelInterface;
use App\Repositories\ClientRepository;

class ClientService implements BaseModelInterface
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Store new client.
     *
     * @return \App\Models\Client $client
     */
    public function store($data):object
    {
        return $this->clientRepository->store($data);
    }

    /**
     * Check client if exist or create.
     *
     * @return \App\Models\Client $client
     */
    public function getClientOrCreate($data)
    {
        return $this->clientRepository->getClient($data) ?? $this->store($data);
    }

    /**
     * Check client if exist.
     *
     * @return array
     */
    public function getClientFillable()
    {
        return $this->clientRepository->getClientFillable();
    }

}

<?php


namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Store new client.
     *
     * @return \App\Models\Client $client
     */
    public function store($data)
    {
        return $this->client->create($data);
    }

    /**
     * Get client.
     *
     * @return \App\Models\Client $client
     */
    public function getClient($data)
    {
        return $this->client->where('email', $data['email'])->first();
    }

    /**
     * Get client fillables.
     *
     * @return array
     */
    public function getClientFillable()
    {
        return $this->client->getFillable();
    }

}

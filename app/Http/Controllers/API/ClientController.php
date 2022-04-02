<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Client\StoreRequest;
use App\Http\Resources\ClientResource;
use App\Http\Traits\ResponseTrait;
use App\Services\ClientService;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    use ResponseTrait;

    private $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = new ClientResource($this->clientService->store($request->validated()));
        return $this->success(__('Client created successfully'), $data, Response::HTTP_CREATED);
    }
}

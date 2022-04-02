<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ClientInvoice\StoreRequest;
use App\Http\Resources\ClientInvoiceResource;
use App\Http\Traits\ResponseTrait;
use App\Services\ClientInvoiceService;
use Illuminate\Http\Response;

class ClientInvoiceController extends Controller
{
    use ResponseTrait;

    private $clientInvoiceService;
    public function __construct(ClientInvoiceService $clientInvoiceService)
    {
        $this->clientInvoiceService = $clientInvoiceService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = new ClientInvoiceResource($this->clientInvoiceService->store($request->validated()));
        return $this->success(__('Invoice created successfully'), $data, Response::HTTP_CREATED);
    }
}

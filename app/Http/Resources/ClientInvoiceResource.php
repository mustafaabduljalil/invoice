<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientInvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'preferred_communication_channel' => $this->preferred_communication_channel,
            'client' => new ClientResource($this->client)
        ];
    }
}

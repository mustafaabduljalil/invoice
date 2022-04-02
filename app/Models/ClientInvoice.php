<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'amount', 'due_date', 'preferred_communication_channel'];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'mobile',
        'preferred_communication_channel'
    ];

    public function invoices()
    {
        return $this->hasMany('App\Models\ClientInvoice');
    }
}

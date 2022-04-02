<?php

namespace App\Jobs;

use App\Mail\SendInvoiceEmail;
use App\Models\ClientInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInvoiceEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $clientInvoice;
    public function __construct(ClientInvoice $clientInvoice)
    {
        $this->clientInvoice = $clientInvoice;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->clientInvoice->client->email)->send(new SendInvoiceEmail($this->clientInvoice));
    }
}

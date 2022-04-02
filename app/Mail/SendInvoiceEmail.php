<?php

namespace App\Mail;

use App\Models\ClientInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $clientInvoice;
    public function __construct(ClientInvoice $clientInvoice)
    {
        $this->clientInvoice= $clientInvoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $clientInvoice = $this->clientInvoice;
        return $this->view('mails.invoice',compact('clientInvoice'));
    }
}

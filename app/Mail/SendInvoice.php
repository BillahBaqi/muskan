<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;
    protected $global_invoice = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice_details)
    {
        $this->global_invoice = $invoice_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'user.invoice-send',
            [
                'order' =>   $this->global_invoice,
            ]
        );
    }
}

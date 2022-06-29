<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPdf extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    protected $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('template/mail')
            ->attachData($this->pdf, $this->data['firstname'] . ' ' . $this->data['lastname'] . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}

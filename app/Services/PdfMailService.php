<?php

namespace App\Services;

use App\Mail\SendPdf;
use PDF;
use Illuminate\Support\Facades\Mail;

class PdfMailService
{

    protected $data = null;
    protected $pdf = null;
    public function __construct($data)
    {
        $this->data = $data;
        $this->pdf = PDF::loadView('template/invoicepdf', array('data' => $this->data));
    }
    public function sendPdf()
    {
        Mail::to([$this->data['email'], 'welltimeprivatespa@gmail.com'])->send(new SendPdf($this->data, $this->pdf->stream()));
    }
}

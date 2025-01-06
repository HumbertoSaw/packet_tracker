<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PacketUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $packet;

    public function __construct($packet)
    {
        $this->packet = $packet;
    }

    public function build()
    {
        return $this->view('emailing.update')
            ->subject('Actualización del Paquete');
    }
}

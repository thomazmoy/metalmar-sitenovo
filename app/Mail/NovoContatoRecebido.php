<?php

namespace App\Mail;

use App\Models\Contato;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovoContatoRecebido extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contato $contato
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo Contato Recebido pelo Site - ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.novo-contato',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

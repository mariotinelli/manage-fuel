<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactReceivedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly array $data,
    )
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->data['email'],
            subject: $this->data['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-received',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

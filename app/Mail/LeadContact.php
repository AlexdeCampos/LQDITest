<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadContact extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(
        protected Lead $lead,
    ) {}

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Primeiro contato',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'welcome-mail',
            with: [
                'name' => $this->lead->name,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

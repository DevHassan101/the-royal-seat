<?php

namespace App\Mail;

use App\Models\Query;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewQueryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Query $query) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Query Received!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.query_notification',
            with: ['query' => $this->query],
        );
    }
}

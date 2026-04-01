<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Booking $booking) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Riding with The Royal Seat!'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.customer_thankyou',
            with: ['booking' => $this->booking],
        );
    }
}

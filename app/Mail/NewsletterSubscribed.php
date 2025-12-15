<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscribed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $email)
    {
    }

    public function build()
    {
        return $this->subject('Newsletter Subscription Confirmation')
                    ->view('emails.newsletter_subscribed');
    }
}

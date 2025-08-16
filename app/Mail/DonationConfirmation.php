<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $donation;

    public function __construct($donation)
    {
        $this->donation = $donation;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Donation!')
            ->view('emails.donation.confirmation');
    }
}

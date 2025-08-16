<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $participation;

    public function __construct($participation)
    {
        $this->participation = $participation;
    }
    public function build()
    {
        return $this->subject('Thanks for Participating!')
            ->view('emails.participation');
    }
}

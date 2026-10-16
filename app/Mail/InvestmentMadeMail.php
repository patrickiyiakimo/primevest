<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvestmentMadeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $investment;

    public $date;

    public function __construct($user, $investment)
    {
        $this->user = $user;
        $this->investment = $investment;
        $this->date = now();
    }

    public function build()
    {
        return $this->subject('Investment Confirmed - '.config('app.name'))
            ->view('emails.invest-notification');
    }
}

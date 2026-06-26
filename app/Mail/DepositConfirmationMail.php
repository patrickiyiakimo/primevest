<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;
    public $method;
    public $date;

    public function __construct($user, $amount, $method)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->method = $method;
        $this->date = now();
    }

    public function build()
    {
        return $this->subject('Deposit Request Submitted - ' . config('app.name'))
                    ->view('emails.deposit-confirmation');
    }
}
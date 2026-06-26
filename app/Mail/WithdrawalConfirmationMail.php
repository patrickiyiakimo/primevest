<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;
    public $method;
    public $wallet_address;
    public $network;
    public $date;

    public function __construct($user, $amount, $method, $wallet_address, $network)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->method = $method;
        $this->wallet_address = $wallet_address;
        $this->network = $network;
        $this->date = now();
    }

    public function build()
    {
        return $this->subject('Withdrawal Request Submitted - ' . config('app.name'))
                    ->view('emails.withdrawal-confirmation');
    }
}
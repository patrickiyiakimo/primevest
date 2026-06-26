<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManualBalanceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;
    public $balance;
    public $type;
    public $description;
    public $date;

    public function __construct($user, $amount, $balance, $type, $description)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->balance = $balance;
        $this->type = $type;
        $this->description = $description;
        $this->date = now();
    }

    public function build()
    {
        if ($this->type == 'credit') {
            $subject = 'Funds Added to Your Account - ' . config('app.name');
        } elseif ($this->type == 'debit') {
            $subject = 'Funds Deducted from Your Account - ' . config('app.name');
        } else {
            $subject = 'Profit Added to Your Account - ' . config('app.name');
        }
            
        return $this->subject($subject)->view('emails.manual-balance');
    }
}
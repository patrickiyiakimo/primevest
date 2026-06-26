<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit;
    public $user;
    public $status;
    public $reason;

    public function __construct($deposit, $user, $status, $reason = null)
    {
        $this->deposit = $deposit;
        $this->user = $user;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function build()
    {
        $subject = $this->status == 'approved' 
            ? 'Deposit Approved - ' . config('app.name')
            : 'Deposit Rejected - ' . config('app.name');
            
        return $this->subject($subject)->view('emails.deposit-status');
    }
}
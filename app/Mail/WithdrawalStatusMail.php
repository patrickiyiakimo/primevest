<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawal;
    public $user;
    public $status;
    public $reason;

    public function __construct($withdrawal, $user, $status, $reason = null)
    {
        $this->withdrawal = $withdrawal;
        $this->user = $user;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function build()
    {
        $subject = $this->status == 'approved' 
            ? 'Withdrawal Approved - ' . config('app.name')
            : 'Withdrawal Rejected - ' . config('app.name');
            
        return $this->subject($subject)->view('emails.withdrawal-status');
    }
}
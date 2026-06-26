<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KycStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $status;
    public $reason;

    public function __construct($user, $status, $reason = null)
    {
        $this->user = $user;
        $this->status = $status;
        $this->reason = $reason;
    }

    public function build()
    {
        $subject = $this->status == 'verified' 
            ? 'KYC Verified - ' . config('app.name')
            : 'KYC Rejected - ' . config('app.name');
            
        return $this->subject($subject)->view('emails.kyc-status');
    }
}
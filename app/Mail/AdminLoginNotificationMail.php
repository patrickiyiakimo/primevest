<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminLoginNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loginTime;
    public $ipAddress;
    public $userAgent;

    public function __construct($user)
    {
        $this->user = $user;
        $this->loginTime = now();
        $this->ipAddress = request()->ip();
        $this->userAgent = request()->userAgent();
    }

    public function build()
    {
        return $this->subject('User Login Notification - ' . config('app.name'))
                    ->view('emails.admin-login-notification');
    }
}
<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class UserLoginNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loginTime;
    public $ipAddress;
    public $userAgent;

    public function __construct($user, Request $request = null)
    {
        $this->user = $user;
        $this->loginTime = now();
        
        // Get request data if available, otherwise use fallback
        if ($request) {
            $this->ipAddress = $request->ip();
            $this->userAgent = $request->userAgent();
        } else {
            $this->ipAddress = request()->ip();
            $this->userAgent = request()->userAgent();
        }
    }

    public function build()
    {
        return $this->subject('New Login to Your ' . config('app.name') . ' Account')
                    ->view('emails.user-login-notification');
    }
}
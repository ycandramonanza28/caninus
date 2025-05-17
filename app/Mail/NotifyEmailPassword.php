<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyEmailPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pass;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('emails.auth.verify-notify')
                    ->subject('Credential Akses Awal Anda')
                    ->with([
                        'user' => $this->user,
                        'pass' => $this->pass,
                        'loginUrl' => route('login'),
                    ]);
    }
}

<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title = 'Zulper Foundation - Welcome!';

    public $email;

    public $username;

    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $username, $name)
    {
        $this->email = $email;
        $this->username = $username;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->view('emails.confirm_register');
    }
}

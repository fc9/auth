<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmIndicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title = 'Zulper Foundation - We inform you that your friend or family member...';

    public $name;

    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $username)
    {
        $this->name = $name;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
            ->view('emails.confirm_indication');
    }
}

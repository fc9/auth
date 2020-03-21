<?php

namespace App\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Log\Logger;

class RegistrationDone implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Logger $logger)
    {
//        Mail::to($this->email)->queue(new \Infra\Mails\ConfirmEmailMail($this->link));
//        $logger->info('Sended confirm email for ' . $this->email . '.');
    }
}

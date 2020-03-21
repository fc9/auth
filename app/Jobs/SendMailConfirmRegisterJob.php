<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Log\Logger;

class SendMailConfirmRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $username;
    protected $name;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle(Logger $logger)
    {
        Mail::to($this->email)->queue(new \App\Mails\ConfirmRegisterMail($this->email, $this->username, $this->name));

        $logger->info('Sended register confirm for ' . $this->email . '.');
    }
}

// php artisan queue:work redis --timeout=60 --sleep=15 --tries=3 --queue=high,medium

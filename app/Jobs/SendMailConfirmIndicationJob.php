<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Log\Logger;

class SendMailConfirmIndicationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $username;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $name, $username)
    {
        $this->email = $email;
        $this->name = $name;
        $this->username = $username;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Logger $logger)
    {
        Mail::to($this->email)->queue(new \App\Mails\ConfirmIndicationMail($this->name, $this->username));

        $logger->info('Sended indication confirm for ' . $this->email . '.');
    }
}

// php artisan queue:work redis --timeout=60 --sleep=15 --tries=3 --queue=high,medium

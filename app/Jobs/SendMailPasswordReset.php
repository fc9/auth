<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Log\Logger;
use App\Mails\PasswordResetMail;

class SendMailPasswordReset implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Logger $logger)
    {
        Mail::to($this->email)->queue(new PasswordResetMail($this->token));

        $logger->info('Sended password reset for ' . $this->email . '.');
    }
}

// php artisan queue:work redis --timeout=60 --sleep=15 --tries=3 --queue=high,medium

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationEmail;
use App\Models\User;

class SendTestEmail extends Command
{
    protected $signature = 'mail:send-test';
    protected $description = 'Send a test email to check mail configuration';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::first(); // Usa un usuario existente en la base de datos

        if (!$user) {
            $this->error('No user found to send test email.');
            return;
        }

        Mail::to($user->email)->send(new ActivationEmail($user));

        $this->info('Test email sent to ' . $user->email);
    }
}

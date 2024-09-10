<?php

namespace App\Console\Commands;

use App\Mail\EmailVerified;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Mail::raw('This is a weekly email reminder.', function ($meesage) {
        //     $meesage->to('yehtutwin.tech@gmail.com')
        //         ->subject('Weekly Reminder');
        // });

        // Mail::to('yehtutwin.tech@gmail.com')->send(new EmailVerified('YHW'));

        $this->info('Email has been sent.');
        Log::info("Email has been sent.");
    }
}

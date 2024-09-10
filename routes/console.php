<?php

use App\Console\Commands\SendEmails;
use App\Services\PostService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('greet {name}', function ($name) {
    // $this->info('Hello' . $name);
    $this->info("Hello {$name}");
    Log::info('hello ' . $name);
});

Schedule::command(SendEmails::class)->hourly();

Artisan::command('post:get {id}', function ($id) {
    $post = new PostService();
    $json = $post->getPost($id);
    var_dump($json);
});

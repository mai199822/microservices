<?php

namespace App\Providers;

use App\Jobs\PostCreated;
use App\Jobs\TestJob;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
   
    public function boot()
    {
        //
        app()->bind(PostCreated::class . '@handle', fn($job) => $job->handle());
    }
}

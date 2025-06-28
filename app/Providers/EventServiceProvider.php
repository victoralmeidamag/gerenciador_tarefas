<?php

namespace App\Providers;

use App\Events\ProjectCreated;
use App\Events\ProjectUpdated;
use App\Events\TaskCreated;
use App\Events\TaskUpdated;
use App\Listeners\LogAuthListener;
use App\Listeners\LogProjectListener;
use App\Listeners\LogTaskListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class  => [LogAuthListener::class],
        Logout::class => [LogAuthListener::class],

        ProjectCreated::class => [LogProjectListener::class],
        ProjectUpdated::class => [LogProjectListener::class],
        TaskCreated::class    => [LogTaskListener::class],
        TaskUpdated::class    => [LogTaskListener::class],
    ];
}

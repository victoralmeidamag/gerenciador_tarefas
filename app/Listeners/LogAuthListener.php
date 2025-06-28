<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Application\Contracts\AppLogger;

class LogAuthListener
{
    public function __construct(private AppLogger $log) {}

    public function handle(Login|Logout $event): void
    {
        $this->log->log(
            $event instanceof Login ? 'user_login' : 'user_logout',
            ['user_id' => $event->user->id]
        );
    }
}
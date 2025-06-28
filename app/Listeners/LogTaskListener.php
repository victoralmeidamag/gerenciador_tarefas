<?php

namespace App\Listeners;

use App\Application\Contracts\AppLogger;
use App\Events\TaskCreated;
use App\Events\TaskUpdated;

class LogTaskListener
{
    public function __construct(private AppLogger $log) {}

    public function handle(TaskCreated|TaskUpdated $event): void
    {
        $this->log->log(
            $event instanceof TaskCreated ? 'task_created' : 'task_updated',
            ['task' => $event->task->toArray()]
        );
    }
}

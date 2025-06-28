<?php

namespace App\Events;

use App\Domain\Task\Entities\Task;

class TaskUpdated
{
    public function __construct(public Task $task){}
}
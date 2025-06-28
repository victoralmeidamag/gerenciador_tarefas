<?php

namespace App\Events;

use App\Domain\Task\Entities\Task;

class TaskCreated
{
    public function __construct(public Task $task){}
}
<?php

namespace App\Application\Contracts;

use App\Domain\Task\Entities\Task;

interface NotificationPublisher
{
    public function taskCreated(Task $task, string $recipientEmail): void;
}
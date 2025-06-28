<?php

namespace App\Infrastructure\RabbitMQ;

use App\Application\Contracts\NotificationPublisher;
use App\Domain\Task\Entities\Task;
use Illuminate\Support\Facades\Queue;
use App\Infrastructure\RabbitMQ\Jobs\SendNotificationJob;

class RabbitMQPublisher implements NotificationPublisher
{
    public function taskCreated(Task $task, string $recipientEmail): void
    {
        Queue::connection('rabbitmq')->push(
            new SendNotificationJob([
                'event'     => 'task_created',
                'task'      => $task->toArray(),
                'recipient' => $recipientEmail,
            ])
        );
    }
}
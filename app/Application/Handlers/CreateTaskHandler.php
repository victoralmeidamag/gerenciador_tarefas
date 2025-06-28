<?php

namespace App\Application\Handlers;

use App\Application\Commands\CreateTask;
use App\Application\Contracts\AppLogger;
use App\Application\Contracts\TaskRepository;
use App\Application\Contracts\NotificationPublisher;
use App\Domain\Shared\Exceptions\TaskCreationException;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Domain\Task\Entities\Task;
use App\Domain\Shared\Enums\TaskStatus;

final class CreateTaskHandler
{
    public function __construct(
        private TaskRepository $repository,
        private NotificationPublisher $publisher,
        private AppLogger $logger
    ) {}

    public function __invoke(CreateTask $command): Task
    {
        try {
            $task = new Task(
                id: Uuid::uuid7(),
                projectId: $command->projectId,
                name: $command->name,
                description: $command->description,
                assigneeId: $command->assigneeId,
                status: TaskStatus::TODO,
            );

            $this->repository->save($task);
            $this->publisher->taskCreated($task);
            $this->logger->log('task_created', [
                'task_id' => $task->id,
                'project_id' => $task->projectId,
            ]);

            return $task;
        } catch (\Throwable $e) {
            throw new TaskCreationException('Erro ao criar tarefa', 0, $e);
        }
    }
}

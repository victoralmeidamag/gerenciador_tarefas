<?php

namespace App\Application\Handlers\Task;

use App\Application\Commands\CreateTask;
use App\Application\Contracts\TaskRepository;
use App\Domain\Task\Entities\Task;
use App\Domain\Shared\Enums\TaskStatus;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Events\TaskCreated;

final class CreateTaskHandler
{
    public function __construct(private TaskRepository $repo) {}

    public function __invoke(CreateTask $cmd): Task
    {
        $task = new Task(
            Uuid::uuid7(),
            $cmd->projectId,
            $cmd->assigneeId,
            $cmd->name,
            $cmd->description,
            TaskStatus::TODO,
        );
        $this->repo->save($task);

        event(new TaskCreated($task));

        return $task;
    }
}

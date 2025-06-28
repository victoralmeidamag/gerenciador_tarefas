<?php

namespace App\Application\Handlers\Task;

use App\Application\Commands\UpdateTask;
use App\Application\Contracts\TaskRepository;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Domain\Task\Entities\Task;
use App\Domain\User\Exceptions\TaskForbiddenException;
use App\Events\TaskUpdated;

final class UpdateTaskHandler
{
    public function __construct(private TaskRepository $repo) {}

    public function __invoke(UpdateTask $cmd): Task
    {
        $existing = $this->repo->find($cmd->id);

        if (! $existing) {
            throw new \RuntimeException('Task não encontrada');
        }

        $currentUser = Uuid::fromString(auth()->id());
        if ($currentUser->toString() !== $existing->assigneeId->toString()) {
            throw new TaskForbiddenException('Você não é o responsável por esta tarefa.');
        }

        $updated = new Task(
            $existing->id,
            $existing->projectId,
            $existing->assigneeId,
            $cmd->name ?? $existing->name,
            $cmd->description ?? $existing->description,
            $cmd->status ?? $existing->status
        );

        $this->repo->save($updated);

        event(new TaskUpdated($updated));

        return $updated;
    }
}

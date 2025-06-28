<?php

namespace App\Infrastructure\Persistence;

use App\Application\Contracts\TaskRepository;
use App\Domain\Shared\Enums\TaskStatus;
use App\Domain\Task\Entities\Task;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Infrastructure\Models\TaskModel;

class EloquentTaskRepository implements TaskRepository
{
    public function save(Task $task): void
    {
        TaskModel::updateOrCreate(
            ['id' => $task->id->toString()],
            [
                'project_id' => $task->projectId->toString(),
                'name' => $task->name,
                'description' => $task->description,
                'assignee_id' => $task->assigneeId->toString(),
                'status' => $task->status->value,
            ]
        );
    }

    public function find(Uuid $id): ?Task
    {
        $model = TaskModel::find($id->toString());
        
        if (!$model) return null;

        return Task::fromArray([
            'id' => Uuid::fromString($model->id),
            'projectId' => Uuid::fromString($model->project_id),
            'name' => $model->name,
            'description' => $model->description,
            'assigneeId' => Uuid::fromString($model->assignee_id),
            'status' => TaskStatus::from($model->status),
        ]);
    }
}

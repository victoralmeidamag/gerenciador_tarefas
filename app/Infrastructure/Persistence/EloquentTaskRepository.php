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
                'project_id'  => $task->projectId->toString(),
                'assignee_id' => $task->assigneeId->toString(),
                'name'        => $task->name,
                'description' => $task->description,
                'status'      => $task->status->value,
            ]
        );
    }

    public function find(Uuid $id): ?Task
    {
        $m = TaskModel::find($id->toString());
        if (!$m) return null;
        return new Task(
            Uuid::fromString($m->id),
            Uuid::fromString($m->project_id),
            Uuid::fromString($m->assignee_id),
            $m->name,
            $m->description,
            
            $this->mapStatus($m->status)
        );
    }

    public function listByProject(Uuid $projectId): array
    {
        return TaskModel::where('project_id', $projectId->toString())
            ->with('assignee')
            ->get()
            ->map(fn($m) => new Task(
                Uuid::fromString($m->id),
                Uuid::fromString($m->project_id),
                Uuid::fromString($m->assignee_id),
                $m->name,
                $m->description,
                $this->mapStatus($m->status)
            ))->all();
    }

    public function delete(Uuid $id): void
    {
        TaskModel::where('id', $id->toString())->delete();
    }

    public function listAll(): array
    {
        return TaskModel::with('assignee')->get()->map(fn($m) => new Task(
            Uuid::fromString($m->id),
            Uuid::fromString($m->project_id),
            Uuid::fromString($m->assignee_id),
            $m->name,
            $m->description,
            $this->mapStatus($m->status)
        ))->all();
    }

    private function mapStatus(string $value): TaskStatus
    {
        return TaskStatus::tryFrom($value)
            ?? TaskStatus::fromCode($value);
    }
}
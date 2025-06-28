<?php

namespace App\Domain\Task\Entities;

use App\Domain\Shared\ValueObjects\Uuid;
use App\Domain\Shared\Enums\TaskStatus;

final class Task
{
    public function __construct(
        public Uuid       $id,
        public Uuid       $projectId,
        public Uuid       $assigneeId,
        public string     $name,
        public ?string    $description,
        public TaskStatus $status,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id->toString(),
            'project_id'  => $this->projectId->toString(),
            'assignee_id' => $this->assigneeId->toString(),
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status->value,
        ];
    }
}
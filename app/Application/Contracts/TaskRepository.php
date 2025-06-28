<?php

namespace App\Application\Contracts;

use App\Domain\Task\Entities\Task;
use App\Domain\Shared\ValueObjects\Uuid;

interface TaskRepository
{
    public function save(Task $task): void;
    public function find(Uuid $id): ?Task;
    public function listByProject(Uuid $projectId): array;
    public function delete(Uuid $id): void;
}
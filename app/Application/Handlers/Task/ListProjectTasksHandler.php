<?php

namespace App\Application\Handlers\Task;

use App\Application\Contracts\TaskRepository;
use App\Domain\Shared\ValueObjects\Uuid;

final class ListProjectTasksHandler
{
    public function __construct(private TaskRepository $repo) {}

    public function __invoke(Uuid $projectId): array
    {
        return $this->repo->listByProject($projectId);
    }
}
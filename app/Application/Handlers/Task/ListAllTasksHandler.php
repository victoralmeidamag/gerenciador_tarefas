<?php

namespace App\Application\Handlers\Task;

use App\Application\Contracts\TaskRepository;

final class ListAllTasksHandler
{
    public function __construct(private TaskRepository $repo) {}
    public function __invoke(): array
    {
        return $this->repo->listAll();
    }
}

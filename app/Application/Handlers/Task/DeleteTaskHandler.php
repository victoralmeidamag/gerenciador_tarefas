<?php

namespace App\Application\Handlers\Task;

use App\Application\Contracts\TaskRepository;
use App\Domain\Shared\ValueObjects\Uuid;

final class DeleteTaskHandler
{
    public function __construct(private TaskRepository $repo) {}
    public function __invoke(Uuid $id): void
    {
        $this->repo->delete($id);
    }
}
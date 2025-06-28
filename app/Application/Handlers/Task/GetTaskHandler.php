<?php

namespace App\Application\Handlers\Task;

use App\Application\Contracts\TaskRepository;
use App\Domain\Task\Entities\Task;
use App\Domain\Shared\ValueObjects\Uuid;
final class GetTaskHandler
{
    public function __construct(private TaskRepository $repo) {}
    
    public function __invoke(Uuid $id): ?Task
    {
        return $this->repo->find($id);
    }
}
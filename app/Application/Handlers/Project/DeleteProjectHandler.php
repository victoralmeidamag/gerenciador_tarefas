<?php

namespace App\Application\Handlers\Project;

use App\Application\Contracts\ProjectRepository;
use App\Domain\Shared\ValueObjects\Uuid;

final class DeleteProjectHandler
{
    public function __construct(private ProjectRepository $repo) {}

    public function __invoke(Uuid $id): void
    {
        $this->repo->delete($id);
    }
}
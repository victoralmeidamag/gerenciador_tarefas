<?php

namespace App\Application\Handlers\Project;

use App\Application\Contracts\ProjectRepository;

final class ListProjectsHandler
{
    public function __construct(private ProjectRepository $repo) {}

    public function __invoke(): array
    {
        return $this->repo->listAll();
    }
}

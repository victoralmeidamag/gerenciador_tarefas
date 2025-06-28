<?php

namespace App\Application\Handlers\Project;

use App\Application\Contracts\ProjectRepository;
use App\Application\Queries\GetProject;
use App\Domain\Project\Entities\Project;

final class GetProjectHandler
{
    public function __construct(private ProjectRepository $repo) {}
    public function __invoke(GetProject $query): ?Project
    {
        return $this->repo->find($query->id);
    }
}
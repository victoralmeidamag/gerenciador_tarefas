<?php

namespace App\Application\Handlers\Project;

use App\Application\Commands\CreateProject;
use App\Application\Contracts\ProjectRepository;
use App\Domain\Project\Entities\Project;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Events\ProjectCreated;

final class CreateProjectHandler
{
    public function __construct(private ProjectRepository $repo) {}

    public function __invoke(CreateProject $cmd): Project
    {
        $project = new Project(Uuid::uuid7(), $cmd->name, $cmd->responsibleId);

        $this->repo->save($project);
        
        event(new ProjectCreated($project));
        
        return $project;
    }
}

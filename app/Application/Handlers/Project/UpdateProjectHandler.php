<?php

namespace App\Application\Handlers\Project;

use App\Application\Commands\UpdateProject;
use App\Application\Contracts\ProjectRepository;
use App\Domain\Project\Entities\Project;
use App\Domain\Project\Exceptions\ProjectForbiddenException;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Events\ProjectUpdated;
use Illuminate\Support\Facades\Auth;

final class UpdateProjectHandler
{
    public function __construct(private ProjectRepository $repo) {}


    public function __invoke(UpdateProject $cmd): Project
    {
        $current = $this->repo->find($cmd->id);

        if (!$current) {
            throw new \RuntimeException('Project not found');
        }

        $loggedUser = Uuid::fromString(Auth::id());

        if ($loggedUser->toString() !== $current->responsibleId->toString()) {
            throw new ProjectForbiddenException('Você não é o responsável por este projeto.');
        }

        $updated = new Project($cmd->id, $cmd->name, $cmd->responsibleId);

        $this->repo->save($updated);

        event(new ProjectUpdated($updated));

        return $updated;
    }
}
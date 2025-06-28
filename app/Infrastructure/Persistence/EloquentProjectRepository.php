<?php

namespace App\Infrastructure\Persistence;

use App\Application\Contracts\ProjectRepository;
use App\Domain\Project\Entities\Project;
use App\Domain\Shared\ValueObjects\Uuid;
use App\Infrastructure\Models\ProjectModel;

class EloquentProjectRepository implements ProjectRepository
{
    public function save(Project $project): void
    {
        ProjectModel::updateOrCreate(
            ['id' => (string) $project->id->toString()],
            [
                'name'           => $project->name,
                'responsible_id' => (string) $project->responsibleId->toString(),
            ]
        );
    }

    public function find(Uuid $id): ?Project
    {
        $m = ProjectModel::with('responsible')->find($id->toString());

        return $m
            ? new Project(
                Uuid::fromString($m->id),
                $m->name,
                Uuid::fromString($m->responsible_id)
            )
            : null;
    }

    public function listAll(): array
    {
        return ProjectModel::with('responsible')->get()->map(function ($m) {
            return [
                'id' => $m->id,
                'name' => $m->name,
                'responsible_name' => optional($m->responsible)->name,
            ];
        })->all();
    }

    public function delete(Uuid $id): void
    {
        ProjectModel::where('id', (string) $id)->delete();
    }
}
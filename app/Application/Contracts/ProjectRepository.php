<?php

namespace App\Application\Contracts;

use App\Domain\Project\Entities\Project;
use App\Domain\Shared\ValueObjects\Uuid;

interface ProjectRepository
{
    public function save(Project $project): void;
    public function find(Uuid $id): ?Project;
    public function delete(Uuid $id): void;

    public function listAll(): array;
}

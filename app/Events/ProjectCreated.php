<?php

namespace App\Events;

use App\Domain\Project\Entities\Project;

class ProjectCreated
{
    public function __construct(public Project $project) {}
}

class ProjectUpdated
{
    public function __construct(public Project $project) {}
}

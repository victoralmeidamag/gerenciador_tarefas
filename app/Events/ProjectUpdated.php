<?php

namespace App\Events;

use App\Domain\Project\Entities\Project;

class ProjectUpdated
{
    public function __construct(public Project $project) {}
}

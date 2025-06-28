<?php
namespace App\Listeners;

use App\Application\Contracts\AppLogger;
use App\Events\ProjectCreated;
use App\Events\ProjectUpdated;

class LogProjectListener
{
    public function __construct(private AppLogger $log) {}

    public function handle(ProjectCreated|ProjectUpdated $event): void
    {
        $this->log->log(
            $event instanceof ProjectCreated ? 'project_created' : 'project_updated',
            ['project' => $event->project->toArray()]
        );
    }
}

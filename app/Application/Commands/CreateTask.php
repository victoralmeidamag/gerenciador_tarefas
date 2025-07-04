<?php

namespace App\Application\Commands;

use App\Domain\Shared\ValueObjects\Uuid;

final readonly class CreateTask
{
    public function __construct(
        public Uuid   $projectId,
        public Uuid   $assigneeId,
        public string $name,
        public ?string $description,
    ) {}
}
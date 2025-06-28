<?php

namespace App\Application\Commands;

use App\Domain\Shared\ValueObjects\Uuid;

final readonly class CreateTask
{
    public function __construct(
        public Uuid $projectId,
        public string $name,
        public ?string $description,
        public Uuid $assigneeId,
    ) {}
}
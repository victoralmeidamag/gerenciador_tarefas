<?php

namespace App\Application\Commands;

use App\Domain\Shared\Enums\TaskStatus;
use App\Domain\Shared\ValueObjects\Uuid;

final readonly class UpdateTask
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public ?string $description,
        public TaskStatus $status,
    ) {}
}
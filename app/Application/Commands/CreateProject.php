<?php

namespace App\Application\Commands;

use App\Domain\Shared\ValueObjects\Uuid;

final readonly class CreateProject
{
    public function __construct(
        public string $name,
        public Uuid   $responsibleId,
    ) {}
}

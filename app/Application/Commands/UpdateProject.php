<?php

namespace App\Application\Commands;

use App\Domain\Shared\ValueObjects\Uuid;

final readonly class UpdateProject
{
    public function __construct(
        public Uuid   $id,
        public string $name,
        public Uuid   $responsibleId,
    ) {}
}

<?php

namespace App\Application\Queries;

use App\Domain\Shared\ValueObjects\Uuid;

final readonly class GetProject
{
    public function __construct(public Uuid $id) {}
}

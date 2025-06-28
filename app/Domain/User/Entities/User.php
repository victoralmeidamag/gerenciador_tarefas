<?php

namespace App\Domain\User\Entities;

use App\Domain\Shared\ValueObjects\Uuid;

final class User
{
    public function __construct(
        public ?Uuid $id,
        public string $name,
        public string $email,
        public string $passwordHash,
    ) {}

    public function toArray(): array
    {
        return [
            'id'    => $this->id?->toString(),
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}

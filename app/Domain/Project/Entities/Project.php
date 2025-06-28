<?php

namespace App\Domain\Project\Entities;

use App\Domain\Shared\ValueObjects\Uuid;

final class Project
{
    public function __construct(
        public Uuid   $id,
        public string $name,
        public Uuid   $responsibleId,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'responsible_id' => (string) $this->responsibleId,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
        Uuid::fromString($data['id']),
        $data['name'],
        Uuid::fromString($data['responsible_id']),
        );
    }
}
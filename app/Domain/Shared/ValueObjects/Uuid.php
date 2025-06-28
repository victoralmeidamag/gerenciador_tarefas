<?php

namespace App\Domain\Shared\ValueObjects;

use JsonSerializable;
use Ramsey\Uuid\Uuid as BaseUuid;

final class Uuid implements JsonSerializable
{
    private function __construct(private string $value) {}

    public static function uuid7(): self
    {
        return new self(BaseUuid::uuid7()->toString());
    }

    public static function fromString(string $value): self
    {
        if (!BaseUuid::isValid($value)) {
            throw new \InvalidArgumentException("UUID inválido: $value");
        }
        return new self($value);
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->value;
    }
    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
} 
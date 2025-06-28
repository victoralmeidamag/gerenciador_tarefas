<?php
namespace App\Domain\Task\Entities;

use App\Domain\Shared\ValueObjects\Uuid;
use App\Domain\Shared\Enums\TaskStatus;

final class Task
{
    public function __construct(
        public Uuid $id,
        public Uuid $projectId,
        public string $name,
        public ?string $description,
        public Uuid $assigneeId,
        public TaskStatus $status
    ) {}

    public function toArray(): array
    { 
        return get_object_vars($this); 
    }
    public static function fromArray(array $data): self 
    { 
        return new self(...$data); 
    }
}
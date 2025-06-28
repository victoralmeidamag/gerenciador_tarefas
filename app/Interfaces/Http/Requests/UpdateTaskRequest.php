<?php

namespace App\Interfaces\Http\Requests;

use App\Application\Commands\UpdateTask;
use App\Domain\Shared\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Shared\ValueObjects\Uuid;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => ['nullable','string'],
            'description' => ['nullable','string'],
            'status'      => ['nullable','in:TODO,IN_PROGRESS,DONE'],
        ];
    }

    public function toCommand(string $taskId): UpdateTask
    {
        return new UpdateTask(
            Uuid::fromString($taskId),
            $this->input('name'),
            $this->input('description'),
            $this->filled('status')
                ? TaskStatus::fromCode($this->input('status'))
                : null,
        );
    }
}
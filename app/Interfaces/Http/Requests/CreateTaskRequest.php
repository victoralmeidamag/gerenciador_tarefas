<?php

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Application\Commands\CreateTask;
use App\Domain\Shared\ValueObjects\Uuid;

class CreateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => ['required','string'],
            'description' => ['nullable','string'],
            'assignee_id' => ['required','uuid','exists:users,id'],
        ];
    }

    public function toCommand(string $projectId): CreateTask
    {
        return new CreateTask(
            projectId: Uuid::fromString($projectId),
            assigneeId: Uuid::fromString($this->input('assignee_id')),
            name: $this->input('name'),
            description: $this->input('description'),
        );
    }
}
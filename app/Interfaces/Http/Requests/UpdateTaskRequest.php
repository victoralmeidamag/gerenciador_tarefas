<?php

namespace App\Interfaces\Http\Requests;

use App\Application\Commands\UpdateTask;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Shared\ValueObjects\Uuid;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => ['required','string'],
            'description' => ['nullable','string'],
            'status'      => ['required','in:TODO,IN_PROGRESS,DONE'],
        ];
    }

    public function toCommand(string $taskId): UpdateTask
    {
        return new UpdateTask(
            Uuid::fromString($taskId),
            $this->input('name'),
            $this->input('description'),
            $this->input('status'),
        );
    }
}
<?php

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Application\Commands\UpdateProject;
use App\Domain\Shared\ValueObjects\Uuid;

class UpdateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:120'],
            'responsible_id' => ['required','uuid','exists:users,id'],
        ];
    }

    public function toCommand(string $id): UpdateProject
    {
        return new UpdateProject(
            id: Uuid::fromString($id),
            name: $this->name,
            responsibleId: Uuid::fromString($this->input('responsible_id')),
        );
    }
}
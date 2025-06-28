<?php

namespace App\Interfaces\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Application\Commands\CreateProject;
use App\Domain\Shared\ValueObjects\Uuid;

class CreateProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:120'],
            'responsible_id' => ['required','uuid','exists:users,id'],
        ];
    }

    public function toCommand(): CreateProject
    {
        return new CreateProject(
            name: $this->input('name'),
            responsibleId: Uuid::fromString($this->input('responsible_id')),
        );
    }
}
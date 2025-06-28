<?php

namespace App\Interfaces\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,
            'project_id' => (string) $this->projectId,
            'name' => $this->name,
            'description' => $this->description,
            'assignee_id' => (string) $this->assigneeId,
            'status' => $this->status->value,
        ];
    }
}
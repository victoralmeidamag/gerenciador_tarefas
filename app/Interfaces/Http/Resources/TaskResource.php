<?php

namespace App\Interfaces\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'project_id'  => $this->project_id,
            'assignee_id' => $this->assignee_id,
            'assignee_name' => $this->assignee->name ?? null,
            'name'        => $this->name,
            'description' => $this->description,
            'status'      => $this->status,
        ];
    }
}
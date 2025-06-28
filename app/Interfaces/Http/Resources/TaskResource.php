<?php

namespace App\Interfaces\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Infrastructure\Models\UserModel;
use App\Domain\Shared\ValueObjects\Uuid;

class TaskResource extends JsonResource
{
    public function toArray($request): array
    {
        $id         = $this->id instanceof Uuid ? $this->id->toString() : $this->id;
        $projectId  = $this->project_id ?? ($this->projectId?->toString() ?? null);
        $assigneeId = $this->assignee_id ?? ($this->assigneeId?->toString() ?? null);
        $status     = $this->status instanceof UnitEnum ? $this->status->value : $this->status;

        return [
            'id'              => $id,
            'project_id'      => $projectId,
            'assignee_id'     => $assigneeId,
            'assignee_name'   => $assigneeId ? optional(UserModel::find($assigneeId))->name : null,
            'name'            => $this->name,
            'description'     => $this->description,
            'status'          => $status,
        ];
    }
}
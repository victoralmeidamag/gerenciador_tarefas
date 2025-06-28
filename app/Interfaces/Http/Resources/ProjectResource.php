<?php

namespace App\Interfaces\Http\Resources;

use App\Infrastructure\Models\UserModel;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request): array
    {
        $id = $this->id instanceof \App\Domain\Shared\ValueObjects\Uuid
        ? $this->id->toString()
        : $this->id;
        return [
            'id' => $id,
            'name' => $this->name,
            'responsible_name' => optional(UserModel::find($this->responsibleId))->name,
        ];
    }
}
<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskModel extends Model
{
    protected $table      = 'tasks';
    public    $incrementing = false;
    protected $keyType    = 'string';
    protected $fillable   = [
        'id', 'project_id', 'assignee_id', 'name', 'description', 'status'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'assignee_id');
    }
}
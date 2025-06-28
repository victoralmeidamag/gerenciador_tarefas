<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'project_id', 'name', 'description', 'assignee_id', 'status'
    ];
}
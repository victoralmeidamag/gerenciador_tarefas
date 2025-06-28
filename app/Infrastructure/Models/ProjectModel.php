<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    public    $incrementing = false;
    protected $keyType  = 'string';
    protected $fillable = ['id', 'name', 'responsible_id'];

    public function responsible()
    {
        return $this->belongsTo(UserModel::class, 'responsible_id');
    }
}
<?php

namespace App\Infrastructure\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumToken;
use Illuminate\Support\Str;

class PersonalAccessToken extends SanctumToken
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}

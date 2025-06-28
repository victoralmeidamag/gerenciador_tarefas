<?php

namespace App\Infrastructure\Models;

use App\Domain\Shared\ValueObjects\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted(): void
    {
        static::creating(function (self $user) {
            if (empty($user->id)) {
                $user->id = (string) Str::uuid();
            }
        });
    }

    public function projects()
    {
        return $this->hasMany(ProjectModel::class, 'responsible_id');
    }

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Uuid::fromString($value) : null,
            set: fn ($uuid) => (string) ($uuid instanceof Uuid ? $uuid : Uuid::fromString($uuid)),
        );
    }

}

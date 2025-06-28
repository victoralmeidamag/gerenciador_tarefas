<?php

namespace App\Application\Services;

use App\Domain\Shared\ValueObjects\Uuid;
use App\Infrastructure\Models\UserModel;

class AuthTokenService
{
    public function forUserId(Uuid $id): string
    {
        return UserModel::findOrFail($id)->createToken('api')->plainTextToken;
    }
}

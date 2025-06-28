<?php

namespace App\Application\Services;

use App\Infrastructure\Models\UserModel;

class AuthTokenService
{
    public function forUserId(int $id): string
    {
        return UserModel::findOrFail($id)->createToken('api')->plainTextToken;
    }
}

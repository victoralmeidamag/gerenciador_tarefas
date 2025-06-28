<?php

namespace App\Application\Handlers\User;

use App\Application\Commands\RegisterUser;
use App\Application\Contracts\UserRepository;
use App\Domain\User\Entities\User;
use App\Infrastructure\Models\UserModel;
use Illuminate\Support\Facades\Hash;


final class RegisterUserHandler
{
    public function __construct(private UserRepository $repo) {}

    public function __invoke(RegisterUser $cmd): UserModel
    {
        $user = new User(
            id: null,
            name: $cmd->name,
            email: $cmd->email,
            passwordHash: Hash::make($cmd->password)
        );

        $model = $this->repo->create($user);

        return $model;
    }
}

<?php

namespace App\Application\Handlers\User;


use App\Application\Commands\LoginUser;
use App\Application\Contracts\UserRepository;
use App\Domain\User\Exceptions\InvalidCredentialsException;
use Illuminate\Support\Facades\Hash;
use App\Domain\User\Entities\User;

final class LoginUserHandler
{
    public function __construct(private UserRepository $repo) {}

    public function __invoke(LoginUser $cmd): User
    {
        $user = $this->repo->findByEmail($cmd->email);

        if (! $user || ! Hash::check($cmd->password, $user->passwordHash)) {
            throw new InvalidCredentialsException('Credenciais inválidas.');
        }
        return $user;
    }
}

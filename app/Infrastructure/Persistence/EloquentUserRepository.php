<?php

namespace App\Infrastructure\Persistence;

use App\Application\Contracts\UserRepository;
use App\Domain\User\Entities\User;
use App\Infrastructure\Models\UserModel;

class EloquentUserRepository implements UserRepository
{
   public function create(User $user): UserModel
    {
        return UserModel::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $user->passwordHash,
        ]);
    }

    public function findByEmail(string $email): ?User
    {
        $m = UserModel::where('email',$email)->first();
        return $m ? new User($m->id, $m->name, $m->email, $m->password) : null;
    }
}

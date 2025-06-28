<?php

namespace App\Application\Contracts;


use App\Domain\Shared\ValueObjects\Uuid;
use App\Domain\User\Entities\User;
use App\Infrastructure\Models\UserModel;


interface UserRepository
{
    public function create(User $user): UserModel;
    public function findByEmail(string $email): ?User;

    public function findEmailById(Uuid $id): ?User;
}
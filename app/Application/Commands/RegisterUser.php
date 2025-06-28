<?php

namespace App\Application\Commands;

final readonly class RegisterUser
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {}
}

<?php

namespace App\Application\Commands;

final readonly class LoginUser
{
    public function __construct(
        public string $email,
        public string $password
    ) {}
}

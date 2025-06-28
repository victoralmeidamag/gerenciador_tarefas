<?php

namespace App\Application\Contracts;

interface AppLogger
{
    public function log(string $message, array $context = []): void;
}

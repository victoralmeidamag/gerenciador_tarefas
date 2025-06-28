<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Domain\User\Exceptions\InvalidCredentialsException;

class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

    public function register(): void
    {
        $this->renderable(function (InvalidCredentialsException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        });
    }
}

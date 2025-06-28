<?php

namespace App\Providers;

use App\Infrastructure\Models\PersonalAccessToken;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

/**
 * @OA\Info(
 *     title="Gerenciador de Tarefas API",
 *     version="1.0.0",
 *     description="Documentação da API do Gerenciador de Tarefas"
 * )
 *
 * @OA\Server(
 *     url="http://localhost",
 *     description="Servidor local"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}

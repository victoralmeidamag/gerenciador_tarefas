<?php

namespace App\Providers;

use App\Application\Contracts\AppLogger;
use App\Application\Contracts\ProjectRepository;
use App\Application\Contracts\UserRepository;
use App\Application\Services\AuthTokenService;
use App\Infrastructure\Persistence\EloquentProjectRepository;
use App\Infrastructure\Persistence\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;
use App\Application\Contracts\TaskRepository;
use App\Application\Contracts\NotificationPublisher;
use App\Infrastructure\Persistence\EloquentTaskRepository;
use App\Infrastructure\RabbitMQ\RabbitMQPublisher;
use App\Infrastructure\Mongo\MongoLogger;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(TaskRepository::class, EloquentTaskRepository::class);
        $this->app->bind(NotificationPublisher::class, RabbitMQPublisher::class);
        $this->app->bind(AppLogger::class,MongoLogger::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->singleton(AuthTokenService::class);
        $this->app->bind(ProjectRepository::class, EloquentProjectRepository::class);

    }
}

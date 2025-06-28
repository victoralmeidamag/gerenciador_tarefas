<?php

namespace App\Infrastructure\Mongo;

use App\Application\Contracts\AppLogger;
use MongoDB\Client;
use MongoDB\Collection;

class MongoLogger implements AppLogger
{
    protected Collection $collection;

    public function __construct(Client $client)
    {
          $this->collection = $client->selectCollection(
        config('database.connections.mongodb.database'), // mais confiável que `env()`
        'logs'
    );
    }

    public function log(string $message, array $context = []): void
    {
        $this->collection->insertOne([
            'level' => 'info',
            'message' => $message,
            'context' => $context,
            'ip' => request()->ip(),
            'route' => request()->path(),
            'payload' => request()->all(),
            'user' => optional(auth()->user())->id,
            'created_at' => now(),
        ]);
    }
}

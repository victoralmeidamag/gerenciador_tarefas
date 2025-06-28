<?php

namespace App\Infrastructure\Mongo;

use App\Application\Contracts\AppLogger;
use Illuminate\Support\Facades\DB;          // <—
use MongoDB\Collection;

class MongoLogger implements AppLogger
{
    protected Collection $collection;

    public function __construct()
    {
        $conn   = DB::connection('mongodb');
        $client = $conn->getClient();
        $dbName = $conn->getDatabaseName(); 

        $this->collection = $client->selectCollection($dbName, 'logs');
    }

    public function log(string $message, array $context = []): void
    {
        $this->collection->insertOne([
            'level'      => 'info',
            'message'    => $message,
            'context'    => $context,
            'ip'         => request()->ip(),
            'route'      => request()->path(),
            'payload'    => request()->all(),
            'user'       => optional(auth()->user())->id,
            'created_at' => now(),
        ]);
    }
}

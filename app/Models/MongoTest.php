<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class MongoTest extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'mongo_tests';

    protected $fillable = ['name'];
}
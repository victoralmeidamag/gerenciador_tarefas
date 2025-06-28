<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-mongo', function () {
    \App\Models\MongoTest::create(['name' => 'Teste Mongo']);
    return \App\Models\MongoTest::all();
});
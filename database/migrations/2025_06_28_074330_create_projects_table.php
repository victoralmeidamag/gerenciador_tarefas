<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('responsible_id');
            $table->timestamps();

            $table->foreign('responsible_id')
                  ->references('id')->on('users')
                  ->cascadeOnDelete();

            $table->index('responsible_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

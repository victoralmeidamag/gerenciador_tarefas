<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->uuid('assignee_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('assignee_id')->references('id')->on('users')->onDelete('cascade');

            $table->index('project_id');
            $table->index('assignee_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

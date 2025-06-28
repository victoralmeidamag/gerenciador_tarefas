<?php

namespace App\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     required={"id","project_id","name","status","created_at","updated_at"},
 *
 *     @OA\Property(property="id", type="string", format="uuid", example="78b8e7ad-f8e4-4e2d-a4c1-789611d0b0a7"),
 *     @OA\Property(property="project_id", type="string", format="uuid", example="9a2b65a4-ffb2-4e5f-aef6-7c508c9b21d1"),
 *     @OA\Property(property="name", type="string", example="Implementar login"),
 *     @OA\Property(property="description", type="string", example="Criar tela e endpoint de login"),
 *     @OA\Property(property="status", type="string", example="TODO"),
 *     @OA\Property(property="assignee_id", type="string", format="uuid", example="20747cde-02a3-4c9c-af0d-52b6d479e6a2"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-28T22:17:53Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-28T22:17:53Z")
 * )
 */
class TaskSchema {}

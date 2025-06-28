<?php

namespace App\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="Project",
 *     type="object",
 *     required={"id", "name", "responsible_id", "created_at", "updated_at"},
 *     @OA\Property(property="id", type="string", format="uuid", example="9a2b65a4-ffb2-4e5f-aef6-7c508c9b21d1"),
 *     @OA\Property(property="name", type="string", example="Projeto Exemplo"),
 *     @OA\Property(property="responsible_id", type="string", format="uuid", example="0e1d2a3c-4b5f-6789-abcd-ef1234567890"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-28T22:17:53Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-28T22:17:53Z")
 * )
 */
class ProjectSchema {}

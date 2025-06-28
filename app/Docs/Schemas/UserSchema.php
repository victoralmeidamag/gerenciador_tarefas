<?php

namespace App\Docs\Schemas;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     required={"id", "name", "email", "created_at", "updated_at"},
 *     @OA\Property(property="id", type="string", format="uuid", example="a1b2c3d4-e5f6-7890-abcd-1234567890ef"),
 *     @OA\Property(property="name", type="string", example="Victor Magalhães"),
 *     @OA\Property(property="email", type="string", format="email", example="victor@email.com"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true, example=null),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-28T22:17:53Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-28T22:17:53Z")
 * )
 */
class UserSchema {}

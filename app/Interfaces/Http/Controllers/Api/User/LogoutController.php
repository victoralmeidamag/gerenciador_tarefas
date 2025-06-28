<?php

namespace App\Interfaces\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    public function logout(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}

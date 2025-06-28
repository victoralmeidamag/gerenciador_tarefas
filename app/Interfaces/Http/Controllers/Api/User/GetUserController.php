<?php

namespace App\Interfaces\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class GetUserController extends Controller
{
  public function me(): JsonResponse
    {
        return response()->json(Auth::user());
    }
}

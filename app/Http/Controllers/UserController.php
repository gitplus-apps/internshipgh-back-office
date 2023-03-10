<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
class UserController extends Controller
{
    public function index() : JsonResponse
    {
        $users = User::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> UserResource::collection($users)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobRoleResource;
use App\Models\RoleCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobRoleController extends Controller
{
    public function index() : JsonResponse
    {
        $job_roles = RoleCategory::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> JobRoleResource::collection($job_roles)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Resources\SchoolResource;

class SchoolController extends Controller
{
    public function index(): JsonResponse
    {
        $schools = School::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> SchoolResource::collection($schools)
        ]);
    }
    
    public function store(Request $request): JsonResponse
    {
    
    }
    
    public function update(Request $request) : JsonResponse
    {
    
    }
}

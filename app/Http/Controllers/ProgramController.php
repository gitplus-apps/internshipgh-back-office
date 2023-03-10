<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Http\Resources\ProgramResource;

class ProgramController extends Controller
{
    public function index(){
        $programs = Programme::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> ProgramResource::collection($programs)
        ]);
    }
}

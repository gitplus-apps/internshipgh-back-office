<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Resources\Mobile\SchoolResource;
use App\Http\Resources\Mobile\QualificationResource;
use App\Http\Resources\Mobile\LevelResource;
use App\Http\Resources\Mobile\ProgrammeResource;
use App\Models\Qualification;
use App\Models\Level;
use App\Models\Programme;

class RegistrationController extends Controller
{
    
    public function schools(){
        $schools = School::where('deleted','0')->get();
        
        return response()->json([
            "ok"=>true,
            "data"=> SchoolResource::collection($schools)
        ]);
    }
    
    public function qualifications(){
        $qualifications = Qualification::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> QualificationResource::collection($qualifications),
        ]);
    }
    
    public function levels(){
        $levels = Level::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
           "data" =>LevelResource::collection($levels),
        ]);
    }
    
    public function programs(){
        $programs = Programme::where('deleted','0')->get();
         
         return response()->json([
             "ok"=> true,
            "data" =>ProgrammeResource::collection($programs),
         ]);
    }
    
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Resources\Mobile\SchoolResource;
use App\Http\Resources\Mobile\QualificationResource;
use App\Http\Resources\Mobile\LevelResource;
use App\Http\Resources\Mobile\ProgrammeResource;
use App\Models\District;
use App\Models\InternshipType;
use App\Models\Qualification;
use App\Models\Level;
use App\Models\Programme;
use App\Models\Region;
use App\Models\RoleCategory;
use App\Models\Sector;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    
    public function schools() :JsonResponse{
        $schools = School::where('deleted','0')->get();
        
        return response()->json([
            "ok"=>true,
            "data"=> SchoolResource::collection($schools)
        ]);
    }
    
    public function qualifications():JsonResponse {
        $qualifications = Qualification::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> QualificationResource::collection($qualifications),
        ]);
    }
    
    public function levels() :JsonResponse{
        $levels = Level::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
           "data" =>LevelResource::collection($levels),
        ]);
    }
    
    public function programs():JsonResponse{
        $programs = Programme::where('deleted','0')->get();
         
         return response()->json([
             "ok"=> true,
            "data" =>ProgrammeResource::collection($programs),
         ]);
    }
    
    public function regions() :JsonResponse{
        $regions = Region::select('code','description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=>  $regions,
        ]);
    }
    
    public function sectors() :JsonResponse{
        $sectors = Sector::select('sector_code as code','sector_desc as description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=>  $sectors,
        ]);
    }
    
    public function districts():JsonResponse {
        $districts = District::select('code','name as description','region as region_code')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> $districts,
        ]);
        
    }
    public function jobRoles():JsonResponse {
        $jobroles = RoleCategory::select('role_code as code', 'role_desc as description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> $jobroles,
        ]);
    }
    
    public function internshipType():JsonResponse {
        $types = InternshipType::select('type_code as code','type_desc as description')->where('deleted','0')->get();
        
        
        return response()->json([
            "ok"=> true,
            "data"=> $types,
        ]);
    }

}

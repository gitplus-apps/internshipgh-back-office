<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Http\Resources\SectorResource;

class SectorController extends Controller
{
    public function index() :JsonResponse
    {
        $sectors = Sector::where("deleted","0")->get();
        
        return response()->json([
            'ok'=> true,
            "data" => SectorResource::collection($sectors)
        ]);
    }
    

}

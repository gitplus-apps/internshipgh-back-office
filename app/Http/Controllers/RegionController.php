<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index() :JsonResponse
    {
        
        $regions = Region::select('transid','code', 'description')->where('deleted','0')->get();
        
        return response()->json([
                "ok"=> true,
                "data"=> $regions
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    public function index () : JsonResponse
    {
        $districts = District::select('tbldistrict.code','tbldistrict.name','tbldistrict.region as region_code','tblregion.description as region')
                            ->join('tblregion','tblregion.code','tbldistrict.region')
                            ->where('tbldistrict.deleted','0')->get();
                            
        return response()->json([
            'ok'=> true,
            "data"=> $districts
        ]);
    }
}

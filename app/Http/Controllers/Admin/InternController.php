<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intern;
use App\Http\Resources\Admin\InternResource;

class InternController extends Controller
{
    public function interns(){
        $interns = Intern::where('deleted','0')->get();
      
        
        return response()->json([
            "ok"=> true,
            "data"=> InternResource::collection($interns)
        ]);
    }
}

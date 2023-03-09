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
        $intern = Intern::where("intern_code",'INTFDD0178D')->first();
        
        dd($intern->sectors);
        
        return response()->json([
            "ok"=> true,
            "data"=> InternResource::collection($interns)
        ]);
    }
}

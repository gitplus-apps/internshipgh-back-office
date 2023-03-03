<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\School;
use App\Models\Level;
use App\Models\Qualification;
use App\Models\District;
use App\Models\Sector;
use App\Models\Region;
use App\Models\InternshipType;
use App\Models\RoleCategory;
use Illuminate\Support\Facades\DB;
class RouteController extends Controller
{
   
    public function dashboard(){
        return view('dashboard');
    }
    
    public function registration(){
        $programmes = Programme::all();
        $schools = School::all();
        $levels = Level::all();
        $qualifications = Qualification::all();
        $districts = District::all();
        $regions = Region::all();
        $sectors = Sector::all();
        $internship_type = InternshipType::all();
        $schools = School::all();
        $jobroles = RoleCategory::all();
      
    
        return view('registration',compact('programmes','schools','levels','qualifications','districts','regions','sectors','internship_type','schools','jobroles'));
    }
    
    public function setProfile(){
        return view('modules.intern.setProfile');
    }

    
}


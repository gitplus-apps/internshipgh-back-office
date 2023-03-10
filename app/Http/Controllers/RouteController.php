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
use Illuminate\Support\Facades\Auth;
class RouteController extends Controller
{
   
    public function dashboard(){
        
        if(Auth::user()->usertype === "intern"){
            return view('modules.dashboards.intern');
        }
        
        return view('modules.dashboards.admin');
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

        $sectors = Sector::all();
        $regions = Region::all();
        $districts = District::all();
        $jobroles = RoleCategory::all();
        $schools = School::all();
        $internship_type = InternshipType::all();
        $levels = Level::all();
        $programmes = Programme::all();
        $qualifications =  Qualification::all();

        return view('modules.intern.setProfile', compact('sectors','regions','districts','jobroles','schools','internship_type','levels','programmes','qualifications'));
    }
    
    public function getInterns(){
        return view('modules.interns.index');
    }
    
    public function getOrganizations(){
        return view('modules.organizations.index');
    }
    
    public function getSchools(){
        return view('modules.schools.index');
    }
    
    public function getSectors(){
        return view("modules.sectors.index");
    }
    
    public function getPrograms(){
        return view("modules.programmes.index");
    }
    
    public function getJobRoles(){
        return view("modules.job_roles.index");
    }

    public function getRegions(){
        return view("modules.regions.index");
    }
    
    public function getDistricts(){
        return view("modules.districts.index");
    }
    
    public function getUsers(){
        return view("modules.users.index");
    }
}


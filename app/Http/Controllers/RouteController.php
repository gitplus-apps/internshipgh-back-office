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
    private $qual_code =[
        "certificate"=>"1001",
        "diploma"=>"1002",
        "degree"=>"1003",
        "post_grad_diploma"=>"1004",
        "masters"=>"1005",
        "doctorate"=>"1006"
    ];
    
    
    //homepage
    public function homePage(){
    
        return view('welcome');
    }
    
    //contact us
    public function contactUs(){
        return view('contact');
    }
    
    public function aboutUs(){
        return view('about-us');
    }
    
    public function services(){
        return view('services'); 
    }
    
    public function payment(){
        return view('payment');
    }
    
    public function termsOfUse(){
        return view('terms-of-use');
    }
    
    public function privacy(){
        return view('privacy');
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
      
    
        return view('registration',compact('programmes','schools','levels','qualifications','districts','regions','sectors','internship_type','schools','jobroles', 'amount'));
    }
    

    
}


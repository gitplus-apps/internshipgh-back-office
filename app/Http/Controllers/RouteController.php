<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
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
    
    public function termsOfUse(){
        return view('terms-of-use');
    }
    
    public function privacy(){
        return view('privacy');
    }
 
}


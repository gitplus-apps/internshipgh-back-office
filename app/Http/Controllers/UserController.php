<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intern;
use Exception;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() : JsonResponse
    {
        $users = User::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> UserResource::collection($users)
        ]);
    }
    
    public function delete(Request $request){
        
        try{
        
          $validator = Validator::make(
          $request->all(),
          [
            "user_code"=> "required|exists:tbluser,user_code"
          ],[
            "user_code.required" => "User Code is required",
            "user_code.exists"=> "User Code does not exist",
          ]);
        
         if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Account Deletion UnSuccessful. " . join(" ,", $validator->errors()->all()),
                "error" => [
                    "msg" => "Request validation failed. " . join(" ,", $validator->errors()->all()),
                    "fix" => "Please fix all validation errors",
                ]
            ]);
        }
       
            $user = User::where('user_code', $request->user_code)->first();   
            $user->delete();
                
            $intern = Intern::where('user_code', $user->user_code)->first();
                
            $intern->delete();
            
            return response()->json([
                "ok"=> true,
                "msg"=> "User Account deleted successfully"
            ]);
            
        }catch(Exception $e){
            
            return response()->json([
                "ok"=> false,
                "msg"=> $e->getMessage(),
                "data"=> [],
            ]) ;
        }
            
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Resources\Mobile\SchoolResource;
use App\Http\Resources\Mobile\QualificationResource;
use App\Http\Resources\Mobile\LevelResource;
use App\Http\Resources\Mobile\ProgrammeResource;
use App\Http\Resources\Mobile\UserResource;
use App\Http\Resources\mobile\UserResource as MobileUserResource;
use App\Models\District;
use App\Models\InternshipType;
use App\Models\Qualification;
use App\Models\Level;
use App\Models\Programme;
use App\Models\Region;
use App\Models\RoleCategory;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Intern;
use App\Models\InternCity;
use App\Models\InternDistrict;
use App\Models\InternRegion;
use App\Models\InternSector;
use App\Models\User;
use App\Models\InternJobRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    
    public function schools() :JsonResponse{
        $schools = School::where('deleted','0')->get();
        
        return response()->json([
            "ok"=>true,
            "data"=> SchoolResource::collection($schools)
        ]);
    }
    
    public function qualifications():JsonResponse {
        $qualifications = Qualification::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> QualificationResource::collection($qualifications),
        ]);
    }
    
    public function levels() :JsonResponse{
        $levels = Level::where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
           "data" =>LevelResource::collection($levels),
        ]);
    }
    
    public function programs():JsonResponse{
        $programs = Programme::where('deleted','0')->get();
         
         return response()->json([
             "ok"=> true,
            "data" =>ProgrammeResource::collection($programs),
         ]);
    }
    
    public function regions() :JsonResponse{
        $regions = Region::select('code','description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=>  $regions,
        ]);
    }
    
    public function sectors() :JsonResponse{
        $sectors = Sector::select('sector_code as code','sector_desc as description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=>  $sectors,
        ]);
    }
    
    public function districts():JsonResponse {
        $districts = District::select('code','name as description','region as region_code')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> $districts,
        ]);
        
    }
    public function jobRoles():JsonResponse {
        $jobroles = RoleCategory::select('role_code as code', 'role_desc as description')->where('deleted','0')->get();
        
        return response()->json([
            "ok"=> true,
            "data"=> $jobroles,
        ]);
    }
    
    public function internshipType():JsonResponse {
        $types = InternshipType::select('type_code as code','type_desc as description')->where('deleted','0')->get();
        
        
        return response()->json([
            "ok"=> true,
            "data"=> $types,
        ]);
    }

    public function registration(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "fname" => ['required', 'string', 'max:255'],
                "lname" => ['required', 'string', 'max:255'],
                "gender"=>['required'],
                "email" => ['required',  'email', 'max:255', 'unique:tbluser,email'],
                "phone" => ['required','unique:tbluser,phone'],
                "school_code" => ['required'],
                "prog_code"=> ['required'],
                "qual_code"=>  ['required'],
                "level_code" => ['required'],
                "sectors" =>['required'],
                "districts"=> ['required'],
                "experience"=> ['required'],
                "start_date"=> ['required'],
                "end_date"=> ['required'],
                "job_roles"=>['required'],
                "internship_type"=>['required'],
                "password"=> ['required'],
            ],
            [
                "fname.required" => "First name is required",
                "lname.required" => "Last name is required",
                "email.required" => "Email is required",
                "email.unique"=> "Email Address already exists",
                "gender.required"=> "Gender is required",
                "experience.required"=> "Work Experience is required",
                "school_code.required"=> "School Name is required",
                "phone.required" => "Phone number is required",
                "phone.unique"=> "Phone number already exists",
                "prog_code.required"=> "Programm Field is required",
                "level_code.required"=> "Level Field is required",
                "sectors.required"=> "Industry Field is required",
                "regions" => "Region Field is required",
                "districts.required"=>  "District Field is required",
                "cities.required"=>"City  Field is required",
                "job_roles.required"=> "Job Roles Field is required",
                "start_date.required"=> "Start Date Field is required",
                "end_date.required"=> "End Date Field is required",
                "internship_type.required"=> "Internship Type Field is required",
                "password.required"=> "Password Field is required",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Account creation failed. " . join(" ", $validator->errors()->all()),
                "error" => [
                    "msg" => "Request validation failed" . join(" ", $validator->errors()->all()),
                    "fix" => "Please fix all validation errors",
                ]
            ]);
        }

        $checkemail = User::where("email", $request->email)->first();
        $checkphone = User::where("phone",$request->phone)->first();

        if (!empty($checkemail) || !empty($checkphone)) {
            return response()->json([
                "ok" => false,
                "msg" => "Account creation failed, email or phone number already taken"
            ]);
        }




        try {
            DB::beginTransaction();

                $transid = strtoupper(bin2hex(random_bytes(4)));
                $intern_code = 'INT' . $transid;
                $user_transid = strtoupper(bin2hex(random_bytes(4)));
                $user_code = "USR" . $user_transid;

                Intern::insert([
                    "transid" => $transid,
                    "intern_code" => $intern_code,
                    "user_code"=>$user_code,
                    "email"=> $request->email,
                    "fname" => $request->fname,
                    "lname" => $request->lname,
                    "mname" => $request->mname,
                    "gender"=>$request->gender,
                    "phone" => $request->phone,
                    "paid"=> 0,
                    "whatsapp"=> $request->whatsapp,
                    "intern_type"=> $request->internship_type,
                    "school_code"=>$request->school_code,
                    "prog_code"=> $request->prog_code,
                    "qual_code"=>$request->qual_code,
                    "level_code"=> $request->level_code,
                    "start_date"=> $request->start_date,
                    "end_date"=> $request->end_date,
                    "experience"=> $request->experience,
                    "deleted" =>  '0',
                    "createdate" =>  date("Y-m-d"),
             
                ]);

                $user = User::insert([
                   
                    "user_code" => $user_code,
                    "phone"=> $request->phone,
                    "email"=> $request->email,
                    "usertype"=> "USER01",
                    "deleted"=>'0',
                    "password" =>Hash::make($request->password),
                    "createdate" =>  date("Y-m-d"),
                    "modifydate"=> date("Y-m-d"),
                ]);
                
                
                foreach($request->regions as $region_code){
                    InternRegion::insert([
                        "transid"=>  strtoupper(bin2hex(random_bytes(4))),
                        "intern_code"=> $intern_code,
                        "region_code" => $region_code,
                        "deleted"=>'0',
                        "createdate"=> date('Y-m-d'),
                        "modifydate"=> date('Y-m-d'),
                    ]);
                }

                foreach($request->districts as $district_code){
                    InternDistrict::insert([
                        "transid"=>  strtoupper(bin2hex(random_bytes(4))),
                        "intern_code"=> $intern_code,
                        "district_code" => $district_code,
                        "deleted"=>'0',
                        "createdate"=> date('Y-m-d'),
                        "modifydate"=> date('Y-m-d'),
                    ]);
                }
                    foreach($request->sectors as $sector_code){
                        InternSector::insert([
                            "transid"=>  strtoupper(bin2hex(random_bytes(4))),
                            "intern_code"=> $intern_code,
                            "sector_code" => $sector_code,
                            "deleted"=>'0',
                            "createdate"=> date('Y-m-d'),
                            "modifydate"=> date('Y-m-d'),
                        ]);
                    }
                    

                    foreach($request->cities as $city){
                        InternCity::insert([
                            "transid"=>  strtoupper(bin2hex(random_bytes(4))),
                            "intern_code"=> $intern_code,
                            "city_desc" => strtoupper($city),
                            "deleted"=>'0',
                            "createdate"=> date('Y-m-d'),
                            "modifydate"=> date('Y-m-d'),
                        ]);
                    }

                    foreach($request->job_roles as $role_code){
                        InternJobRole::insert([
                            "transid"=>  strtoupper(bin2hex(random_bytes(4))),
                            "intern_code"=> $intern_code,
                            "role_code" => $role_code,
                            "deleted"=>'0',
                            "createdate"=> date('Y-m-d'),
                            "modifydate"=> date('Y-m-d'),
                        ]);
                    }




         

            $message = <<<MSG
            Hello {$request->fname} {$request->lname}, welcome to Internship Ghana.
            Here, we link students to the right job environment to acquire the appropriate and relevant skillset needed in their desired field of practice.
            MSG;

            // if (!empty($request->phone)) {
            //     $sms = new Sms(env("ARKESEL_SMS_SENDER_ID", "InternGh"), env("ARKESEL_SMS_API_KEY"));
            //     $sms->send($request->phone, $message);
            // };

            // Mail::to($request->email)->send(new InternRegistrationEmail([

            //     "fname" => $request->fname,
            //     "lname" => $request->lname,
            // ]));
            
            

            
            $payload = [
                "fname"=> $request->fname,
                "mname"=> $request->mname,
                "lname"=> $request->lname,
                "school_code"=> $request->school_code,
                "school_name"=> $user->intern->school->sch_desc,
                "level" => $user->intern->level->level_desc,
                "user_code"=> $user->user_code,
                "email"=> $user->email,
                "qualification"=> $user->intern->qualification->qual_desc,
                "phone" => $user->phone,
                "whatapp_number"=> $user->intern->whatsapp,
                
            ];
            
            DB::commit();
            
            return response()->json([
                "ok" => true,
                "msg" => "Account created successfully",
                "data"=>$payload
            ]);
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            Log::error($e->getMessage());
            
            return response()->json([
                "ok" => false,
                "msg" =>    "An error occured while adding record, please contact admin",
                "error" => [
                    "msg" => $e->getMessage(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
        }

    }

}
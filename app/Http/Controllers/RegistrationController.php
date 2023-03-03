<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\Intern;
use App\Models\InternCity;
use App\Models\InternDistrict;
use App\Models\InternRegion;
use App\Models\InternSector;
use App\Models\User;
use App\Models\InternJobRole;
use Illuminate\Support\Facades\Hash;
use App\Mail\InternRegistrationEmail;
use Illuminate\Support\Facades\Mail;
use App\Gitplus\Arkesel as Sms;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            $transResult = DB::transaction(function () use ($request) {

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

                User::insert([
                    //"transid"=> $user_transid,
                    "user_code" => $user_code,
                    "phone"=> $request->phone,
                    "email"=> $request->email,
                    "usertype"=> "USER01",
                    "deleted"=>'0',
                    "password" =>Hash::make('12345678'),
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
                    $cities = explode(",",$request->cities);

                    foreach($cities as $city){
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




            });

            $message = <<<MSG
            Hello {$request->fname} {$request->lname}, welcome to Internship Ghana.
            Here, we link students to the right job environment to acquire the appropriate and relevant skillset needed in their desired field of practice.
            MSG;

            if (!empty($request->phone)) {
                $sms = new Sms(env("ARKESEL_SMS_SENDER_ID", "InternGh"), env("ARKESEL_SMS_API_KEY"));
                $sms->send($request->phone, $message);
            };

            Mail::to($request->email)->send(new InternRegistrationEmail([

                "fname" => $request->fname,
                "lname" => $request->lname,
            ]));

            return response()->json([
                "ok" => true,
                "msg" => "Account created successfully",
            ]);

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "Account created successfully",
            ]);
        } catch (\Exception $e) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

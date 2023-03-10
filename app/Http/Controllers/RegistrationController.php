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
                "gender" => 'required',
                "email" => ['required',  'email', 'max:255', 'unique:tbluser,email'],
                "phone" => ['required', 'unique:tbluser,phone'],
                "school_code" => 'required',
                "whatsapp" => ['required'],
                "prog_code" => ['required'],
                "qual_code" =>  ['required'],
                "level_code" => ['required'],
                "sectors" => ['required'],
                "districts" => ['required'],
                "experience" => ['required'],
                "job_roles" => ['required'],
                "internship_type" => ['required'],
                "regions" => ['required'],
                "cities" => ['required'],
            ],
            [
                "fname.required" => "First name is required",
                "lname.required" => "Last name is required",
                "email.required" => "Email is required",
                "email.unique" => "Email Address already exists",
                "gender.required" => "Gender is required",
                "experience.required" => "Work Experience is required",
                "school_code.required" => "School Name is required",
                "phone.required" => "Phone number is required",
                "phone.unique" => "Phone number already exists",
                "prog_code.required" => "Programm Field is required",
                "level_code.required" => "Level Field is required",
                "sectors.required" => "Industry Field is required",
                "regions" => "Region Field is required",
                "districts.required" =>  "District Field is required",
                "cities.required" => "City  Field is required",
                "job_roles.required" => "Job Roles Field is required",
                "internship_type.required" => "Internship Type Field is required",
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $transid = strtoupper(bin2hex(random_bytes(4)));
            $intern_code = 'INT' . $transid;

            Intern::insert([
                "transid" => $transid,
                "intern_code" => $intern_code,
                "user_code" => $request->user_code,
                "email" => $request->email,
                "fname" => $request->fname,
                "lname" => $request->lname,
                "mname" => $request->mname,
                "gender" => $request->gender,
                "phone" => $request->phone,
                "paid" => 0,
                "whatsapp" => $request->whatsapp,
                "intern_type" => $request->internship_type,
                "school_code" => $request->school_code,
                "prog_code" => $request->prog_code,
                "qual_code" => $request->qual_code,
                "level_code" => $request->level_code,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "experience" => $request->experience,
                "deleted" =>  '0',
                "createdate" =>  date("Y-m-d"),

            ]);

          



            foreach ($request->regions as $region_code) {
                InternRegion::insert([
                    "transid" =>  strtoupper(bin2hex(random_bytes(4))),
                    "intern_code" => $intern_code,
                    "region_code" => $region_code,
                    "deleted" => '0',
                    "createdate" => date('Y-m-d'),
                    "modifydate" => date('Y-m-d'),
                ]);
            }

            foreach ($request->districts as $district_code) {
                InternDistrict::insert([
                    "transid" =>  strtoupper(bin2hex(random_bytes(4))),
                    "intern_code" => $intern_code,
                    "district_code" => $district_code,
                    "deleted" => '0',
                    "createdate" => date('Y-m-d'),
                    "modifydate" => date('Y-m-d'),
                ]);
            }
            foreach ($request->sectors as $sector_code) {
                InternSector::insert([
                    "transid" =>  strtoupper(bin2hex(random_bytes(4))),
                    "intern_code" => $intern_code,
                    "sector_code" => $sector_code,
                    "deleted" => '0',
                    "createdate" => date('Y-m-d'),
                    "modifydate" => date('Y-m-d'),
                ]);
            }
            foreach ($request->job_roles as $role_code) {
                InternJobRole::insert([
                    "transid" =>  strtoupper(bin2hex(random_bytes(4))),
                    "intern_code" => $intern_code,
                    "role_code" => $role_code,
                    "deleted" => '0',
                    "createdate" => date('Y-m-d'),
                    "modifydate" => date('Y-m-d'),
                ]);
            }

            $cities = explode(",", $request->cities);

            foreach ($cities as $city) {
                InternCity::insert([
                    "transid" =>  strtoupper(bin2hex(random_bytes(4))),
                    "intern_code" => $intern_code,
                    "city_desc" => strtoupper($city),
                    "deleted" => '0',
                    "createdate" => date('Y-m-d'),
                    "modifydate" => date('Y-m-d'),
                ]);
            }

            DB::commit();
            return redirect('/')->with('status','Account creating successful');

            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($validator)->withInput()->with('error','Oops!, Internal error occured');
            
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

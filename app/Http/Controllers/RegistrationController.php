<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;


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
                "mname" => ['required', 'string', 'max:255'],
                "lname" => ['required', 'string', 'max:255'],
                "email" => ['required', 'string', 'email', 'max:255', 'unique:tbluser'],
                "school_code" => ['required', 'string', 'max:255'],
                "phone" => ['required'],
            ],
            [
                "fname.required" => "First name is required",
                "lname.required" => "Last name is required",
                "email.required" => "Email is required",
                "username.required" => "Username is required",
                "school_code.required"=> "School Name is required",
                "phone.required" => "Phone number is required",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "User Registration Failed: " . join(" ", $validator->errors()->all()),
            ]);
        }
        
        try {
            $transResult = DB::transaction(function () use ($request) {
                $transid = strtoupper(bin2hex(random_bytes(4)));
                
                Intern::insert([
                    "transid" => $transid,
                    "intern_code" => 'INT' . $transid,
                    "fname" => $request->fname,
                    "lname" => $request->lname,
                    "mname" => $request->mname,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "deleted" =>  0,
                    "createdate" =>  date("Y-m-d H:i:s"),
                ]);

                

                
               
            });

            if (!empty($transResult)) {
                throw new Exception($transResult);
            }

            return response()->json([
                "ok" => true,
                "msg" => "User added successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "ok" => false,
                "msg" => "An error occured while adding record, please contact admin",
                "error" => [
                    "msg" => $e->__toString(),
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

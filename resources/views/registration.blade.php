@extends('layout.main')

@section('page-content')
<link rel="stylesheet" href="{{asset("assets/css/registration.css")}}">
<div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url({{asset('assets/img/services.jpg')}});">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <h2>Register</h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Registration</li>
                </ul>
            </div>
        </div>
        
    
        
    </div>
</div>

<div class="container mx-auto">
    <div class="row default-padding1 h-100 d-flex align-items-center justify-content-center">
        <div class="col-md-8 ">
        
        
        
            <form class="msform" id="intern_registration" >
         
                <!-- fieldsets -->
         
                  
           
                @csrf
                <p class="text-center" style="font-size: 20px;"><span class="text-danger">Notice : An amount of Ghc10 is required as payment to complete the registration process.</span</p>
                
                <fieldset class="tab" id="tab-1">
                    <h2 class="fs-title">Personal Details ( 1 / 7 ) </h2>
                    <div>
                        <label for="fname">First Name <span class="text-danger"> * </span></label>
                        <input type="text" name="fname" class="input" placeholder="eg. John" required />
                    </div>
                    <div>
                        <label for="mname">Middle Name</label>
                        <input type="text" name="mname" class="input" />
                    </div>
                    <div>
                        <label for="lname">Last Name <span class="text-danger"> * </span></label>
                        <input type="text" name="lname" placeholder="eg. Doe" class="input"   required/>
                    </div>
                   <div>
                   <label for="gender">Gender <span class="text-danger"> * </span> </label>
                    <select type="text" name="gender"  class="required"  >
                        <option value="" disabled selected >-- select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                   </div>
                    
                    
                    <button type="button" name="next" id="personal_details" onclick="run(1, 2);" class="next1 action-button align-center" >Next</button>
                </fieldset>
           
             
         
                <fieldset class="tab" id="tab-2" >
                    <h2 class="fs-title">Contact Details ( 2 / 7 ) </h2>
                    <div>
                        <label for="email">Email <span class="text-danger"> * </span></label>
                        <input type="email" name="email" class="input" placeholder="eg. johndoe@gmail.com"  {{-- required --}}/>
                    </div>
                    <div>
                        <label for="phone">Phone <span class="text-danger"> * </span></label>
                        <input type="text" name="phone" class="input" placeholder="eg. 02000000001"  {{-- required --}}/>
                    </div>
                   <div>
                        <label for="whatsapp">WhatsApp Number <span class="text-danger"> * </span></label>
                        <input type="text" name="whatsapp" class="input" placeholder="eg. 02000000001"  {{-- required --}}/>
                   </div>
                
                    <button type="button" name="previous" class="previous action-button-previous" onclick="run(2, 1);" value="Previous">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(2, 3);" value="Next">Next</button>
                </fieldset>
            
                <fieldset class="tab" id="tab-3">
                    <h2 class="fs-title">Academic Details ( 3 / 7 ) </h2>
                  <div>
                  <label for="school_code">Select School <span class="text-danger"> * </span> </label>
                    <select type="text" name="school_code"  class="select2  required" {{--  required--}}>
                        <option value="" disabled selected >-- select --</option>
                        @foreach ($schools as $school)
                            <option value="{{$school->sch_code}}">{{$school->sch_desc}}</option>
                        @endforeach
                    </select>
                  </div>
                    
                   <div>
                        <label for="qual_code">Qualification <span class="text-danger"> * </span> </label>
                        <select type="text" name="qual_code" class="select2" {{--  required--}}>
                            <option value="" disabled selected>-- select --</option>
                          @foreach($qualifications as $qualification)
                             <option value="{{$qualification->qual_code}}">{{$qualification->qual_desc}}</option>
                          @endforeach
                        </select>
                   </div>
                   <div>
                        <label for="prog_code">Select Programme <span class="text-danger"> * </span> </label>
                        <select type="text" class="select2 form-control basic-select " name="prog_code"  {{--  required--}}>
                            <option value="" disabled selected>-- select --</option>
                            @foreach($programmes as $program)
                                <option value="{{$program->prog_code}}">{{$program->prog_desc}}</option>
                            @endforeach
                        </select>
                   </div>
                    <div>
                        <label for="level_code">Select Level <span class="text-danger"> * </span> </label>
                        <select type="text" name="level_code" class="select2" {{-- style="width:100%; height:20px;  margin-bottom:20px;" --}} placeholder="Level" {{--  required--}}>
                            <option value="" disabled selected>-- select --</option>
                            @foreach ($levels as $level)
                                <option value="{{$level->level_code}}">{{$level->level_desc}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                 
                
                    <button type="button" name="previous" class="previous action-button-previous" onclick="run(3, 2);" value="Previous">Previous</button>
                    <button type="button" name="next" class="next action-button" onclick="run(3, 4);" >Next</button>
                </fieldset>
                <fieldset class="tab" id="tab-4">
                    <h2 class="fs-title">Internship Details ( 4 / 7 )</h2>
                  <div>
                  <label for="sectors">Preferred Sectors ( Choose Multiple ) <span class="text-danger"> * </span> </label>

                  <select type="text" name="sectors[]" class="select2 form-control multiple" multiple  required>

                    
                        @foreach($sectors as $sector)
                            <option value="{{$sector->sector_code}}" >{{$sector->sector_desc}}</option>
                        @endforeach
                    </select>
                  </div>
                  
                  <div>
                      <label for="regions[]">Preferred Regions ( Select Multiple ) <span class="text-danger"> * </span> </label>

                      <select type="text" name="regions[]" id="regions" class="select2 multiple" multiple="multiple"  {{--  required--}}>

                        
                        @foreach ($regions as $region)
                            <option value="{{$region->code}}">{{$region->description}}</option>
                        @endforeach
                      {{--   @foreach ($regions as $region)
                            <option value="{{$region->code}}">{{$region->name}}</option>
                        @endforeach --}}
                    </select>
                  </div>
                   
                  <div><label for="districts">Preferred Districts ( Choose Multiple ) <span class="text-danger"> * </span></label>

                    <select type="text" name="districts[]" class="select2" multiple id="districts"{{--  required--}} >

                      
                {{--        @foreach ($districts as $district)
                            <option value="{{$district->code}}">{{$district->name}}</option>                           
                       @endforeach --}}
                    </select>
                  </div>
                    
                   <div><label for="">Preferred Cities ( Enter Multiple ) <span class="text-danger"> * </span></label>
                    <input type="text" name="cities" {{--  required--}} placeholder="Separate By ` ,` " class="input">
                   
                   </div>
                
                  
                    <button type="button" name="previous" class="previous action-button-previous"  onclick="run(4, 3);">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(4, 5);">Next</button>
                </fieldset>
                <fieldset class="tab" id="tab-5">
                    <h2 class="fs-title"> Experience ( 5 / 7 )</h2>
                   <div><label for="experience">Work Experience <span class="text-danger"> * </span></label>
                    <input type="text" name="experience" placeholder=" eg. 2 years" class="input"/>
                   
                   </div>
                    <div>
                        <label for="job_roles">Preferred Job Roles ( Select Multiple ) <span class="text-danger"> * </span></label>
                        <select name="job_roles[]" id="" class="select2 mulitple" multiple>
                       
                            @foreach ($jobroles as $role)
                                <option value="{{$role->role_code}}">{{$role->role_desc}}</option>                               
                            @endforeach
                        </select>
                    </div>
                
                    
                    <button type="button" name="previous" class="previous action-button-previous"  onclick="run(5, 4);">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(5, 6);">Next</button>
                </fieldset>
                
                <fieldset class="tab" id="tab-6">
                    <h2 class="fs-title">Availability ( 6 / 7 )</h2>
                    <div><label for="start_date">Start Date <span class="text-danger"> * </span></label>
                        <input type="date" name="start_date" {{-- id="start_date" --}} class="input"   />
                    
                    </div>
                   <div><label for="end_date">End Date <span class="text-danger"> * </span></label>
                    <input type="date" name="end_date" class="input"/>
                   </div>
                   
                   
                   <button type="button" name="previous" class="previous action-button-previous"  onclick="run(6, 5);">Previous</button>
                   <button type="button" name="next" class="next action-button"  onclick="run(6, 7);">Next</button>
                </fieldset>
           
                <fieldset class="tab" id="tab-7">
                    <h2 class="fs-title">Internship Type ( 7 / 7 )</h2>
                    <div>
                    <label for="internship_type">Internship Type<span class="text-danger"> * </span></label>
                    <select class="" name="internship_type" > 
                        <option value="" disabled selected>-- select --</option>
                       @foreach ($internship_type as $type)
                           <option value="{{$type->type_code}}">{{$type->type_desc}}</option>
                       @endforeach
                    </select>
                </div>
              
                    <button type="button" name="previous" class="previous action-button-previous"  onclick="run(7,6);" >Previous</button>
                    
                    <button type="submit" name="submit" class="submit action-button" id="submit_btn" >Sign Up </button>
                </fieldset>
         
          
            </form>
            <!-- link to designify.me code snippets -->
           
            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
</div>
</div>
</div>
<script>
    let districts = @json($districts)
  
</script>


{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otp_modal">
    Launch demo modal
  </button> --}}
  
  <!-- Charge Modal -->
  <div class="msform">
    <form id="charge" >
  <div class="modal fade" id="charge_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      
        <div class="modal-header">
            <h2 class="fs-title">Payment Details  </h2>
 
        </div>
        <div class="modal-body">
            
                @csrf
                {{-- payment Details --}}
            
                    
                        <div>
                            <label for="fname">Email<span class="text-danger"> * </span></label>
                            <input type="text" name="email" class="form-control" placeholder="eg. johndoe@gmail.com" required />
                        </div>
                        <div>
                            <label for="mname">Phone<span class="text-danger"> * </span></label>
                            <input type="text" name="phone" class="form-control"  placeholder="eg. 0200000000" required/>
                        </div>
                   
                       <div>
                       <label for="provider">Network Provider <span class="text-danger"> * </span> </label>
                        <select type="text" name="provider"  class=""  >
                       
                            <option value="mtn">Mtn</option>
                            <option value="vod">Vodafone</option>
                            <option value="tgo">AirtelTigo</option>
                        </select>
                       </div>
                        
                        
            </div>
               
        <div class="">
            <button style="float:right;" type="submit" name="next" id="submit_charge" class="next1 action-button align-center" >Submit</button>
      
        </div>
      </div>
    </div>
    </div>
</form>
  </div>


{{-- verify otp modal --}}
<div class="msform">
    <form id="verify" >
    @csrf
  <div class="modal fade" id="otp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      
        <div class="modal-header">
            <h2 class="fs-title">Verify OTP  </h2>
 
        </div>
        <div class="modal-body">
               
                        <h5 class="">Please enter the one time password sent to your number to verify 
                           
                             </h5>
                             <input type="hidden" name="reference" id="charge-ref">
                             <input type="hidden" name="otp" id="otp">
                        <div class="mt-4 text-center">
                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2" required minlength="1" maxlength="1" />
                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" required minlength="1" maxlength="1"/>
                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" required minlength="1" maxlength="1"/>
                            <span class="splitter">&ndash;</span>
                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" required minlength="1" maxlength="1"/>
                            <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" required minlength="1" maxlength="1"/>
                            <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" required minlength="1" maxlength="1"/>
                        </div>
                        
                    
              
                        
        </div>
               
        <div class="">
            
            <button type="submit" name="next" id="verify_otp" class="next1 action-button align-center mt-3" style="float:right;">Verify</button>
        </div>
      </div>
    </div>
    </div>
</form>
  </div>


<script src="{{asset("assets/js/registration.js")}}">  </script>


@endsection
@extends('layout.main')

@section('page-content')

<style>
    /*custom font*/
            @import url(https://fonts.googleapis.com/css?family=Montserrat);
            
            /*basic reset*/
           
            
            body {
                font-family: montserrat, arial, verdana;
                background: transparent;
            }
            
            /*form styles*/
            #msform {
              /*   text-align: center;  */
                position: relative;
                margin-top: 0px;
            }
            
            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 15px;
                box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
                padding: 20px 30px;
                box-sizing: border-box;
                width: 80%;
                margin: 0 10%;
            
                /*stacking fieldsets above each other*/
                position: relative;
            }
            
            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }
            
            /*inputs*/
            #msform input, #msform textarea {
                padding: 5px;
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                border-radius: 0px;
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                box-shadow: none !important;
             /*    color: #2C3E50; */
                font-size: 13px;
            }
            
            #msform input:focus, #msform textarea:focus {
               
                box-shadow: none !important;
                border: 1px solid #FE000B;
                outline-width: 0;
                transition: All 0.5s ease-in;
                -webkit-transition: All 0.5s ease-in;
                -moz-transition: All 0.5s ease-in;
                -o-transition: All 0.5s ease-in;
            }
            
            /*buttons*/
            #msform .action-button {
                width: 100px;
                background: #FE000B;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }
            
           /*  #msform .action-button:hover, #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
            } */
            
            #msform .action-button-previous {
                width: 100px;
                background: gray;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px;
            }
            
            
            
            /*headings*/
            .fs-title {
                text-align: center;
                font-size: 18px;
                margin-bottom: 30px;
                text-transform: uppercase;
                color: #FE000B;
                margin-bottom: 10px;
                letter-spacing: 2px;
                font-weight: bold;
            }
            
            .fs-subtitle {
                font-weight: normal;
                font-size: 13px;
                color: #666;
                margin-bottom: 20px;
            }
            
          

</style>
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
            <form id="msform" >
         
                <!-- fieldsets -->
              
           
                @csrf
                <fieldset class="tab" id="tab-1">
                    <h2 class="fs-title">Personal Details</h2>
                    <div>
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="eg. John" required />
                    </div>
                    <div>
                        <label for="mname">Middle Name</label>
                        <input type="text" name="mname" class="form-control"  />
                    </div>
                    <div>
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" placeholder="eg. Doe" class="form-control"   required/>
                    </div>
                   <div>
                   <label for="gender">Gender</label>
                    <select type="text" name="gender" placeholder="Gender" class=""  >
                        <option value="" disabled selected >-- select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                   </div>
                    
                    
                    <button type="button" name="next" id="personal_details" onclick="run(1, 2);" class="next1 action-button align-center" >Next</button>
                </fieldset>
           
            
         
                <fieldset class="tab" id="tab-2" >
                    <h2 class="fs-title">Contact Details</h2>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="eg. johndoe@gmail.com"  {{-- required --}}/>
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" placeholder="eg. 02000000001"  {{-- required --}}/>
                    </div>
                   <div>
                        <label for="whatsapp">WhatsApp Number</label>
                        <input type="text" name="whatsapp" placeholder="eg. 02000000001"  {{-- required --}}/>
                   </div>
                
                    <button type="button" name="previous" class="previous action-button-previous" onclick="run(2, 1);" value="Previous">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(2, 3);" value="Next">Next</button>
                </fieldset>
            
                <fieldset class="tab" id="tab-3">
                    <h2 class="fs-title">Academic Details</h2>
                  <div>
                  <label for="school_code">Select School</label>
                    <select type="text" name="school_code"  class="select2 basic-select required" {{--  required--}}>
                        <option value="" disabled >-- select --</option>
                        @foreach ($schools as $school)
                            <option value="{{$school->sch_code}}">{{$school->sch_desc}}</option>
                        @endforeach
                    </select>
                  </div>
                    
                   <div>
                        <label for="qual_code">Qualification</label>
                        <select type="text" name="qual_code" class="select2" {{--  required--}}>
                            <option value="" disabled selected>-- select --</option>
                          @foreach($qualifications as $qualification)
                             <option value="{{$qualification->qual_code}}">{{$qualification->qual_desc}}</option>
                          @endforeach
                        </select>
                   </div>
                   <div>
                        <label for="prog_code">Select Programme</label>
                        <select type="text" class="select2 form-control basic-select " name="prog_code"  {{--  required--}}>
                            <option value="" disabled selected>-- select --</option>
                            @foreach($programmes as $program)
                                <option value="{{$program->prog_code}}">{{$program->prog_desc}}</option>
                            @endforeach
                        </select>
                   </div>
                    <div>
                        <label for="level_code">Select Level</label>
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
                    <h2 class="fs-title">Internship Details</h2>
                  <div>
                  <label for="sectors">Preferred Sectors ( Choose Multiple ) </label>
                  <select type="text" name="sectors[]" class="select2" multiple  required>
                    
                        @foreach($sectors as $sector)
                            <option value="{{$sector->sector_code}}" >{{$sector->sector_desc}}</option>
                        @endforeach
                    </select>
                  </div>
                  
                  <div>
                      <label for="regions[]">Preferred Regions ( Select Multiple ) </label>
                      <select type="text" name="regions[]" class="select2" multiple="multiple"  {{--  required--}}>
                        
                        @foreach ($regions as $region)
                            <option value="{{$region->code}}">{{$region->description}}</option>
                        @endforeach
                      {{--   @foreach ($regions as $region)
                            <option value="{{$region->code}}">{{$region->name}}</option>
                        @endforeach --}}
                    </select>
                  </div>
                   
                  <div><label for="districts">Preferred Districts ( Choose Multiple )</label>
                    <select type="text" name="districts[]" class="select2" multiple {{--  required--}}>
                      
                       @foreach ($districts as $district)
                            <option value="{{$district->code}}">{{$district->name}}</option>                           
                       @endforeach
                    </select>
                  </div>
                    
                   <div><label for="">Preferred Cities ( Enter Multiple ) </label>
                    <input type="text" name="cities" {{--  required--}} placeholder="Separate By ` ,` ">
                   
                   </div>
                
                  
                    <button type="button" name="previous" class="previous action-button-previous"  onclick="run(4, 3);">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(4, 5);">Next</button>
                </fieldset>
                <fieldset class="tab" id="tab-5">
                    <h2 class="fs-title">Skills / Experience</h2>
                   <div><label for="experience">Experience</label>
                    <input type="text" name="experience" placeholder="Experience"/>
                   
                   </div>
                    <div>
                        <label for="job_roles">Preferred Job Roles ( Select Multiple )</label>
                        <select name="job_roles[]" id="" class="select2" multiple>
                       
                            @foreach ($jobroles as $role)
                                <option value="{{$role->role_code}}">{{$role->role_desc}}</option>                               
                            @endforeach
                        </select>
                    </div>
                
                    
                    <button type="button" name="previous" class="previous action-button-previous"  onclick="run(5, 4);">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(5, 6);">Next</button>
                </fieldset>
                
                <fieldset class="tab" id="tab-6">
                    <h2 class="fs-title">Availability </h2>
                    <div><label for="start_date">Start Date</label>
                        <input type="date" name="start_date" type="date" />
                    
                    </div>
                   <div><label for="end_date">End Date</label>
                    <input type="date" name="end_date" />
                   </div>
                   
                   
                   <button type="button" name="previous" class="previous action-button-previous"  onclick="run(6, 5);">Previous</button>
                   <button type="button" name="next" class="next action-button"  onclick="run(6, 7);">Next</button>
                </fieldset>
           
                <fieldset class="tab" id="tab-7">
                    <h2 class="fs-title">Internship Type</h2>
                    
                    <select class="" name="internship_type" > 
                        <option value="" disabled selected>-- select --</option>
                       @foreach ($internship_type as $type)
                           <option value="{{$type->type_code}}">{{$type->type_desc}}</option>
                       @endforeach
                    </select>
                 
              
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

    $(".tab").css("display","none");
    
    $("#tab-1").css("display","block");
    
    $("#submit_btn").click(function(){
        const registrationForm = document.getElementById('msform');
        const submitBtn = document.getElementById('submit_btn');
        $(registrationForm).submit(function(e){
            e.preventDefault();
           
            submitBtn.innerHTML= "";
            submitBtn.innerHTML ="Processing...";
            submitBtn.disabled = true;
           
            let formdata = new FormData(registrationForm);
            
            //toastr options for user registration messages
            toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": true,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "2000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
            let toastMsg = new Toastr();
            fetch(`{{config('app.url')}}/api/intern_registration`,{
                method:'POST',
                body: formdata,
            }).then(function (res){
                return res.json();
            }).then(function (data){
                if(!data.ok){
                
                toastr.error(data.msg, '');
                        
                   
                submitBtn.innerHTML = "";
                submitBtn.innerHTML = "Sign Up"
                submitBtn.disabled = false;
              
                return;
            }
            
            toastr.success(data.msg,'');
          
            submitBtn.innerHTML = "";
            submitBtn.innerHTML = "Sign Up"
            submitBtn.disabled = false;
            registrationForm.reset();
            setTimeout(() => {
                window.location.href = `{{config('app.url')}}/`;
            }, 2000)
                
                
            })
        })
    })
    
    
    
    function run(hideTab, showTab){
        if(hideTab < showTab){
           
          var currentTab = 0;
          x = $('#tab-'+hideTab);
            
          //valdate tab-1 Personal Details
        
            const form = $("#msform");
        		form.validate({
                    ignore: ":hidden",
        			rules: {
        				"fname": {
        					required: true,		
        				},
        				"lname": {
        				    required:true,
        				},
        				"gender":{
        				    required: true,
        				},
                        "email": {
                          required: true, 
                          email: true,
                      },
                      "phone":{
                          required: true,
                          minlength: 10,
                          maxlength: 10,
                      },
                      "whatsapp":{
                          required: true,
                          minlength: 10,
                          maxlength: 10,
                      },
                      "school_code": {
                         required: true,
                      },
                      "prog_code":{
                        required: true,
                      },
                      "cities":{
                        required : true,
                      },
                      "experience": {
                        required: true,
                      },
                      "start_date": {
                            required:true,
                      },
                      "end_date":{
                            required: true,
                      },
                      
        			},
        			messages: {
        				fname: {
        					required: "<span class='text-danger'> First Name is  Required </span>",
                            
        				},
        				mname: {
        				    required: "<span class='text-danger'> Middle Name is Required",
        				},
        				lname: {
        				    required :"<span class='text-danger'> Last Name is Required </span>",
        				},
        				gender: {
        				    required: "<span class='text-danger'> Gender is Required </span>",
        				},
        				email: {
                          required: "<span class='text-danger'> Email is  Required </span>",
                          email: "<span class='text-danger'> Enter a Valid Email Address</span>",
                      },
                      phone: {
                          required :"<span class='text-danger'> Phone Number is Required </span>",
                          minlength: "<span class='text-danger'> Minimum length is 10 </span>",
                          maxlength: "<span class='text-danger'> Maximum length is 10 </span>",
                      },
                      whatsapp :{
                          required: "<span class='text-danger'> Whatsapp Number is Required </span>",
                          minlength: "<span class='text-danger'> Minimum length is 10 </span>",
                          maxlength: "<span class='text-danger'> Maximum length is 10 </span>",
                      },
                      prog_code :{
                        required: "<span class='text-danger'> School Programme is Required </span>",  
                    },
                    cities:{
                        required: "<span class='text-danger'> Preferred Cities is Required </span>",
                    },
                    experience:{
                        required: "<span class='text-danger'> Experience field is Required </span>",
                    },
                    start_date:{
                        required: "<span class='text-danger'> Start Date is Required </span>",
                    },
                    end_date:{
                        required: "<span class='text-danger'> End Date is Required </span>",
                    }
        			},
        			submitHandler:function(form){
        			     return false;
        			}
        		});
        		
        		if (form.valid() != true){
                    return false;
        		}
        		    
      

          
        }
                // Switch tab
        $("#tab-"+hideTab).css("display", "none");
        $("#tab-"+showTab).css("display", "block");
        $("input").css("background", "#fff");
        
        
        
    }
    
   
    
    
</script>


@endsection
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
            
            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                /*CSS counters to number the steps*/
                counter-reset: step;
            }
            
            #progressbar li {
                list-style-type: none;
                color: #FE000B;
                text-transform: uppercase;
                font-size: 9px;
                width: 33.33%;
                float: left;
                position: relative;
                letter-spacing: 1px;
            }
            
            #progressbar li:before {
                content: counter(step);
                counter-increment: step;
                width: 24px;
                height: 24px;
                line-height: 26px;
                display: block;
                font-size: 12px;
                color: #333;
                background: white;
                border-radius: 25px;
                margin: 0 auto 10px auto;
            }
            
            /*progressbar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: white;
                position: absolute;
                left: -50%;
                top: 9px;
                z-index: -1; /*put it behind the numbers*/
            }
            
            #progressbar li:first-child:after {
                /*connector not needed before the first step*/
                content: none;
            }
            
            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            #progressbar li.active:before, #progressbar li.active:after {
                background: #FE000B;
                color: white;
            }
            
            
            /* Not relevant to this form */
            .dme_link {
                margin-top: 30px;
                text-align: center;
            }
            .dme_link a {
                background: #FFF;
                font-weight: bold;
                color: #FE000B;
                border: 0 none;
                border-radius: 25px;
                cursor: pointer;
                padding: 5px 25px;
                font-size: 12px;
            }
            
            .dme_link a:hover, .dme_link a:focus {
                background: #C5C5F1;
                text-decoration: none;
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
                <fieldset>
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
                    <select type="text" name="gender" placeholder="Gender" class="form-control"  required>
                        <option value="" disabled selected>-- select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                   </div>
                    
                    
                    <input type="button" name="next" class="next action-button align-center" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Contact Details</h2>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="eg. johndoe@gmail.com" {{--  required--}}/>
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" placeholder="eg. 02000000001" {{--  required--}}/>
                    </div>
                   <div>
                        <label for="whatsapp">WhatsApp Number</label>
                        <input type="text" name="whatsapp" placeholder="eg. 02000000001" {{--  required--}}/>
                   </div>
                
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Academic Details</h2>
                  <div>
                  <label for="school_code">Select School</label>
                    <select type="text" name="school_code"  class="select2" {{--  required--}}>
                        <option value="" disabled selected>-- select --</option>
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
                    
                 
                
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
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
                
                  
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
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
                
                    
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Availability </h2>
                    <div><label for="start_date">Start Date</label>
                        <input type="date" name="start_date" type="date" />
                    
                    </div>
                   <div><label for="end_date">End Date</label>
                    <input type="date" name="end_date" />
                   </div>
                   
                   
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Internship Type</h2>
                    
                    <select class="" name="internship_type" > 
                        <option value="" disabled selected>-- select --</option>
                       @foreach ($internship_type as $type)
                           <option value="{{$type->type_code}}">{{$type->type_desc}}</option>
                       @endforeach
                    </select>
                   
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" id="submit-btn" value="Submit"/>
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
   
  
    
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    
    $(".next").click(function(){
      if(animating) return false;
      animating = true;
      
      current_fs = $(this).parent();
      next_fs = $(this).parent().next();
      
      //activate next step on progressbar using the index of next_fs
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
      
      //show the next fieldset
      next_fs.show(); 
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale current_fs down to 80%
          scale = 1 - (1 - now) * 0.2;
          //2. bring next_fs from the right(50%)
          left = (now * 50)+"%";
          //3. increase opacity of next_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'relative'
          });
          next_fs.css({'left': left, 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
          current_fs.hide();
          animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
      });
    });
    
    
    
     $(".previous").click(function(){
      if(animating) return false;
      animating = true;
      
      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();
      
      //de-activate current step on progressbar
    //  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      
      //show the previous fieldset
      previous_fs.show(); 
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale previous_fs from 80% to 100%
          scale = 0.8 + (1 - now) * 0.2;
          //2. take current_fs to the right(50%) - from 0%
          left = ((1-now) * 50)+"%";
          //3. increase opacity of previous_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({'left': left});
          previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
          current_fs.hide();
          animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
      });
    });
     
     $('.next').click(function(){
     console.log("hello world")
        $("#msform").validate({
            ignore: ":hidden"
        });
     });
     
     $(".submit").click(function(){
        const registrationForm = document.getElementById('msform');
        const submitBtn = document.getElementById('submit-btn');
        $(registrationForm).submit(function(e){
            e.preventDefault();
            
            submitBtn.innerHTML= "";
            submitBtn.innerHTML ="Processing...";
            submitBtn.disabled = true;
            
            let formdata = new FormData(registrationForm);
            
            fetch(`{{config('app.url')}}/api/intern_registration`,{
                method:'POST',
                body: formdata,
            }).then(function (res){
                return res.json();
            }).then(function (data){
                if(!data.ok){
                    iziToast.show({
                  
                    messageSize: '18',
                    message: data.msg,
                    messageColor: 'white', // blue, red, green, yellow
                    theme: 'light', // dark
                    backgroundColor: 'red',
                    position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                    timeout: 10000,
                });
                submitBtn.innerHTML = "";
                submitBtn.innerHTML = "Sign Up"
                submitBtn.disabled = false;
               
                return;
            }
            iziToast.show({
                // title: 'Hey',
                message: data.msg,
                messageColor: 'white',
                messageSize: '18',
                theme: 'light', // dark
                backgroundColor: 'green',
                position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                timeout: 2000,
            });
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
    
    
    //validate form fields
    function validate(){
        $('#msform').validate({ // initialize the plugin
        rules: {
            fname: {
                required: true,      
            },
            lname: {
                required: true,
            },
            gender:{
                required:true,
            }
            
        }
    });
    }
    </script>
@endsection
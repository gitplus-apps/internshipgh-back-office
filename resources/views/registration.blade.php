@extends('layout.main')

@section('page-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    /*custom font*/
            @import url(https://fonts.googleapis.com/css?family=Montserrat);
            
            /*basic reset*/
            * {
                margin: 0;
                padding: 0;
            }
            
            html {
                height: 100%;
               /*  background: #6441A5; /* fallback for old browsers *
                background: -webkit-linear-gradient(to left, #6441A5, #2a0845); */ /* Chrome 10-25, Safari 5.1-6 */
            }
            
            body {
                font-family: montserrat, arial, verdana;
                background: transparent;
            }
            
            /*form styles*/
            #msform {
                text-align: center;
                position: relative;
                margin-top: 30px;
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
                padding: 15px;
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

<div class="container">
    <div class="row default-padding">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform">
                <!-- progressbar -->
               {{--  <ul id="progressbar">
                    <li class="active">Personal Details</li>
                    <li>Social Profiles</li>
                    <li>Account Setup</li>
                    <li>Social Profiles</li>
                    <li>Account Setup</li>
                    <li>Social Profiles</li>
                    <li>Account Setup</li>
                </ul> --}}
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Personal Details</h2>
                    
                    <input type="text" name="fname" placeholder="First Name" required/>
                    <input type="text" name="mname" placeholder="Middle Name" />
                    <input type="text" name="lname" placeholder="Last Name" required/>
                    <select type="text" name="gender" placeholder="Gender" required>
                        <option value=""  selected disabled>Gender</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Contact Details</h2>
                    
                    <input type="text" name="email" placeholder="Email" required/>
                    <input type="text" name="phone" placeholder="Phone" required/>
                    <input type="text" name="whatsapp" placeholder="WhatsApp Number" required/>
                  
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Academic Details</h2>
                  
                    <select type="text" name="school_code"  required>
                    <option value="" selected disabled>Select School</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text"  name="program" placeholder="Programme" required>
                        <option value="" selected disabled>Select Programme</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text" name="degree_type" placeholder="Degree Type" required>
                        <option value="" selected disabled>Degree Type</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text" name="level" placeholder="Level" required>
                        <option value="" selected disabled>Level</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                   
                  
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Internship Details</h2>
                  
                    <select type="text" name="industry" class="select2" required>
                    <option value="" selected disabled>Industries</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text" name="regions" class="select2" placeholder="Programme" required>
                        <option value="" selected disabled>Preferred Regions</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text" name="districts" placeholder="Degree Type" required>
                        <option value="" selected class="select2" disabled>Districts</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                    <select type="text" name="cities" placeholder="Level" required>
                        <option value="" selected class="select2" disabled>Cities / Towns</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                   
                  
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Skills / Experience</h2>
                   
                    <input type="text" name="skills" placeholder="Skillset"/>
                    <input type="text" name="job_roles[]" placeholder="Job roles "/>
                    
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Availability (Start - End Date) </h2>
                    
                    <input type="text" name="start-date"type="text" placeholder="Start Date"
                    onfocus="(this.type='date')"/>
                    <input type="text" name="end-date" placeholder="End Date" onfocus="(this.type='date')"/>
                   
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Internship Type</h2>
                    
                    <select class="" name="internship_type" > 
                        <option value="" selected disabled>Select</option>
                        <option value="">Onsite / Face-to-Face</option>
                        <option value="">Remote</option>
                    </select>
                   
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                </fieldset>
              {{--   <fieldset>
                    <h2 class="fs-title">Create your account</h2>
                    <h3 class="fs-subtitle">Fill in your credentials</h3>
                    <input type="text" name="email" placeholder="Email"/>
                    <input type="password" name="pass" placeholder="Password"/>
                    <input type="password" name="cpass" placeholder="Confirm Password"/>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                </fieldset> --}}
            </form>
            <!-- link to designify.me code snippets -->
           
            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
</div>
</div>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
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
            'position': 'absolute'
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
    
    $(".submit").click(function(){
      return false;
    })
    </script>
@endsection
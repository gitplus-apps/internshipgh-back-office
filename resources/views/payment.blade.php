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
        
        
            {{-- <p class="text-center" style="font-size: 16px;">The payment of an amount<strong class="text-danger"> 10 Ghana cedis </strong> is required to complete the registation process</p> --}}
                
            <form id="" >
                @csrf
                {{-- payment Details --}}
                <div id="msform">
                    <fieldset class="tab" id="tab-3">
                        <h2 class="fs-title">Payment Details ( 1 / 3 ) </h2>
                        <div>
                            <label for="fname">Email<span class="text-danger"> * </span></label>
                            <input type="text" name="email" class="form-control" placeholder="eg. johndoe@gmail.com" required />
                        </div>
                        <div>
                            <label for="mname">Phone</label>
                            <input type="text" name="phone" class="form-control"  placeholder="eg. 0200000000"/>
                        </div>
                   
                       <div>
                       <label for="provider">Provider <span class="text-danger"> * </span> </label>
                        <select type="text" name="provider"  class="required"  required>
                            <option value="" disabled selected >-- select --</option>
                            <option value="mtn">Mtn</option>
                            <option value="vod">Vodafone</option>
                            <option value="tgo">AirtelTigo</option>
                        </select>
                       </div>
                        
                        
                        <button type="button" name="next" id="personal_details" onclick="run(1, 2);" class="next1 action-button align-center" >Submit</button>
                    </div>
                </fieldset>
                
             
                
                <!-- fieldsets -->
                <fieldset class="tab confirm-otp text-center  my-auto" id="tab-1">
                    <h2 class="fs-title">Enter OTP </h2>
                    <div class="mt-4">
                        <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                        <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                        <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                        <span class="splitter">&ndash;</span>
                        <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                        <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                        <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />
                    </div>
                    <button type="button" name="next" id="personal_details" onclick="run(1, 2);" class="next1 action-button align-center mt-3" >Submit</button>
                </fieldset>
                  
           
                
             
           
                
         
                <fieldset class="tab" id="tab-2" >
                    <h2 class="fs-title">Contact Details ( 3 / 3 ) </h2>
                    <div>
                        <label for="email">Email <span class="text-danger"> * </span></label>
                        <input type="email" name="email" class="form-control" placeholder="eg. johndoe@gmail.com"  {{-- required --}}/>
                    </div>
                    <div>
                        <label for="phone">Phone <span class="text-danger"> * </span></label>
                        <input type="text" name="phone" placeholder="eg. 02000000001"  {{-- required --}}/>
                    </div>
                   <div>
                        <label for="whatsapp">WhatsApp Number <span class="text-danger"> * </span></label>
                        <input type="text" name="whatsapp" placeholder="eg. 02000000001"  {{-- required --}}/>
                   </div>
                
                    <button type="button" name="previous" class="previous action-button-previous" onclick="run(2, 1);" value="Previous">Previous</button>
                    <button type="button" name="next" class="next action-button"  onclick="run(2, 3);" value="Next">Next</button>
                </fieldset>
            
                
                
          
            </form>
            <!-- link to designify.me code snippets -->
           
            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
</div>
</div>
</div>

<script > 

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
           
            fetch(APP_URL+`/api/intern_registration`,{
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
                window.location.href = APP_URL+`/`;
            }, 2000)
                
                
            })
        })
    })
   

</script>


@endsection
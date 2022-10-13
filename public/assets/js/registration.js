
     var reference='';
    //hide all fieldsets tabs
    $(".tab").css("display","none");    
    //display the first fieldset tab 
    $("#tab-1").css("display","block");
    
  
    //making of post request to registration controller
    $("#submit_btn").click(function(){
        const registrationForm = document.getElementById('intern_registration');
        const submitBtn = document.getElementById('submit_btn');
        $(registrationForm).submit(function(e){
            e.preventDefault();
           
            Swal.fire({
                text: "Processing. Please wait...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
            
            
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
                          "showDuration": "500",
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
                Swal.close();
                toastr.error(data.msg, '');
                        
                   
                submitBtn.innerHTML = "";
                submitBtn.innerHTML = "Sign Up"
                submitBtn.disabled = false;
              
                return;
            }
            Swal.close();
            toastr.success(data.msg,'');
          
            
            registrationForm.reset();
            $("#charge_modal").modal('show');
            
                
                
            })
        })
    })
    
    
    //for switching between form fieldsets tabs and also validate form fieldsets in each tab
    function run(hideTab, showTab){
        if(hideTab < showTab){
           
          var currentTab = 0;
          x = $('#tab-'+hideTab);
            
          //valdate tab-1 Personal Details
        
            const form = $("#intern_registration");
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
                        required: "<span class='text-danger'> Work Experience field is Required </span>",
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

   
    $('#regions').on("change", function(e) {
        
        var data = $('#regions').select2("val");
    
        getDistricts(data);
    });
    
    function getDistricts(regions){
        let districtDropDown = document.getElementById("districts");
        
    if(regions != null){
        let selectedDistricts = districts.filter((district) => regions.includes(district.region));

        let fragment = new DocumentFragment();
    
        
        selectedDistricts.map(district => {
            let option = new Option(district.name, district.code);
            fragment.appendChild(option);
        });
    
        districtDropDown.innerHTML = null;
        districtDropDown.appendChild(fragment);
    }else{
        districtDropDown.innerHTML = null;
    }

    }
    
    /* Payment form validation and requests */
    //Initiate payment request
    $("#submit_charge").click(function(){
        const chargeForm = document.getElementById('charge');
        const submitBtn = document.getElementById('submit_charge');
        const form = $('#charge')
        form.validate({
            ignore: "",
			rules: {
			  "email":{
			    required: true,
			    email: true,
			  },
              "phone":{
                  required: true,
                  number:true,
                  minlength: 10,
                  maxlength: 10,
              },
              "provider":{
				    required: true,
				},
			},
			messages: {
                email: {
                          required: "<span class='text-danger'> Email is  Required </span>",
                          email: "<span class='text-danger'> Enter a Valid Email Address</span>",
                      },
                phone:{
                        required :"<span class='text-danger'> Phone Number is Required </span>",
                        number: "<span class='text-danger'> Please enter a valid number. </span>",
                        minlength: "<span class='text-danger'> Minimum length is 10 </span>",
                        maxlength: "<span class='text-danger'> Maximum length is 10 </span>",
                },
                provider: {
                    required: "<span class='text-danger'> Network Provider is  Required </span>",
                }
			},
			submitHandler:function(form){
			     return false;
			}
        });
        
        if (form.valid() != true){
                    return false;
        		}
        		
        		
        		
        $(chargeForm).submit(function(e){
            e.preventDefault();
            //Close the modal when form is submitted 
            $("#charge_modal").modal('hide');
            Swal.fire({
                text: "Processing. Please wait...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
           
            let formdata = new FormData(chargeForm);
         
            
            //toastr options for user registration messages
            toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": true,
                          "onclick": null,
                          "showDuration": "400",
                          "hideDuration": "1000",
                          "timeOut": "2000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
           
            fetch(APP_URL+`/api/payments/charge`,{
                method:'POST',
                body: formdata,
            }).then(function (res){
                return res.json();
            }).then(function (data){
                if(!data.ok){
              
               
                Swal.fire({
                  
                  text: data.msg,
                  icon: 'error',
                  showCloseButton: false,
                  showCancelButton: false,
                  focusConfirm: false,
                  showCancelButton: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  confirmButtonColor: '#FE000B',
                  confirmButtonText: ' Okay  '
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                        $("#charge_modal").modal('show');
                    }
                  })   
              
                return;
            }
           
            if(data['data']['status'] == "pay_offline"){
                Swal.fire({
                   title: data.msg,
                    text: data['data']['displayText'],
                    icon: 'success',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    showCancelButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    confirmButtonColor: '#FE000B',
                    confirmButtonText: ' Okay  '
                  }).then((result) => {
                   
                    if (result.isConfirmed) {
                        window.location.href = APP_URL+`/`;
                    }
                  });
                return;
            }
           
            
            Swal.close();
            $("#otp_modal").modal('show');
           
             reference = data['data']['reference']
             
              chargeForm.reset();
                
            })
        })
    })


/* Payment form validation and requests */
    //Verify Otp
    $("#verify_otp").click(function(){
        const otpForm = document.getElementById('verify');
        const submitBtn = document.getElementById('verify_otp');
       // const form = $('#verify')
      
        		
        $(otpForm).submit(function(e){
        
            e.preventDefault();
            
            const otpField = document.getElementById('otp') 
            otpField.value = document.getElementById('digit-1').value + document.getElementById('digit-2').value + document.getElementById('digit-3').value + document.getElementById('digit-4').value + document.getElementById('digit-5').value + document.getElementById('digit-6').value
        	
        	const refField = document.getElementById('charge-ref');
        	refField.value = reference;
     	   
            
            //Close the modal when form is submitted 
            $("#otp_modal").modal('hide');
            Swal.fire({
                text: "Processing. Please wait...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
           
            let formdata = new FormData(otpForm);
         
            
            //toastr options for user registration messages
            toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-full-width",
                          "preventDuplicates": true,
                          "onclick": null,
                          "showDuration": "400",
                          "hideDuration": "1000",
                          "timeOut": "2000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
           
            fetch(APP_URL+`/api/payments/submit_otp`,{
                method:'POST',
                body: formdata,
            }).then(function (res){
                return res.json();
            }).then(function (data){
                if(!data.ok){
              
                
                Swal.fire({
                  
                  text: data.msg,
                  icon: 'error',
                  showCloseButton: false,
                  showCancelButton: false,
                  focusConfirm: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  showCancelButton: false,
                  confirmButtonColor: '#FE000B',
                  confirmButtonText: ' Okay  '
                }).then((result) => {
                    
                    if (result.isConfirmed) {
                        $("#otp_modal").modal('show');
                    }
                  })
          
              
                return;
            }
        
           
            
            
            Swal.fire({
                title: data.msg,
                 text: data['data']['displayText'],
                 icon: 'success',
                 showCloseButton: false,
                 showCancelButton: false,
                 focusConfirm: false,
                 showCancelButton: false,
                 allowEscapeKey: false,
                 allowOutsideClick: false,
                 confirmButtonColor: '#FE000B',
                 confirmButtonText: ' Okay  '
               });
              otpForm.reset();

            /* setTimeout(() => {
                window.location.href = APP_URL+`/`;
            }, 2000) */
                
                
            })
        })
    })


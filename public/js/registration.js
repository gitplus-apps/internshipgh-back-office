
     var reference='';
    //hide all fieldsets tabs
    $(".tab").css("display","none");    
    //display the first fieldset tab 
    $("#tab-1").css("display","block");
    let payment_email = document.getElementById('payment_email');
    
    
    
   var intern_email;
   var intern_phone;
   
   
   $('#qualification').on("change", function(e) {
        
    let selected_qualification = $('#qualification').select2("val");
    getPrice(selected_qualification);
    
});

    function getPrice(qualification){
        
     let result =   qualifications.find(qual => qual.qual_code  == qualification)
        let amount = result.amount;
        let prog_desc = result.qual_desc;
        
        let amount_para =document.getElementById('amount'); 
        amount_para.innerHTML = "<span class='text-danger'>Notice : An amount of Ghc "+amount+" is required as payment to complete the registration process for the "+prog_desc+" Level.</span>";
        
    
    }

  
    //sort programs based on institution selected 
    
    $('#institution').on("change", function(e) {
        
        let sch_code = $('#institution').select2("val");
    
        getPrograms(sch_code);
    });
    
    function getPrograms(sch_code){
        let programDropDown = document.getElementById("programmes");
        
    if(sch_code != null){
        
        let programs = programmes.filter((prg) => prg.sch_code == sch_code);

        let fragment = new DocumentFragment();
    
        
        programs.map(program => {
            let option = new Option(program.prog_desc, program.prog_code);
            fragment.appendChild(option);
        });
    
        programDropDown.innerHTML = null;
        programDropDown.appendChild(fragment);
    }else{
        programDropDown.innerHTML = null;
    }

    }
    
    
    //making of post request to registration controller
    
    
        const registrationForm = document.getElementById('intern_registration');
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
                          "showDuration": "600",
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
              
                return;
            }
            Swal.close();
            toastr.success(data.msg,'');
          
            intern_email = document.getElementById("intern_email").value;
            intern_phone = document.getElementById("intern_phone").value;
            registrationForm.reset();
            
           
                payment_email.textContent = intern_email;
                $("#charge_modal").modal('show');
                return;
       
            
            setTimeout(function() {
                // window.open(data.data.paymentUrl, "_blank");
                window.location.href = APP_URL+`/`;
            }, 2000);
            
                
                
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
    
    let toggle_payment_phone = document.getElementById('payment_phone_checkbox');
    let payment_phone = document.getElementById('payment_phone');
    $(toggle_payment_phone).click(function (){
       
        if(toggle_payment_phone.checked) {
            payment_phone.value = intern_phone
        } else {
            payment_phone.value = "";
        }
        
    })
    
    
    $("#charge").submit(function(e){
        const chargeForm = document.getElementById('charge');
        e.preventDefault();
        const form = $('#charge')
        form.validate({
            ignore: "",
			rules: {
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
        		
            //Close the modal when form is submitted 
            $("#charge_modal").modal('hide');
            Swal.fire({
                text: "Processing. Please wait...",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false
            });
           
            let formdata = new FormData(chargeForm);
            formdata.append("email",intern_email)
          
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
             intern_email ="";
             form.reset();
                
            })
       
    })


/* Payment form validation and requests */
    //Verify Otp
   /*  $("#verify_otp").click(function(){ */
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
        
           
            
            otpForm.reset();
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
                   //redirect to home screen 
                    window.location.href = APP_URL+`/`;
                    
                }
              })
              

             
                
                
            })
        })
   /*  }) */


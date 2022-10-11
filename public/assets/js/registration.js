    //hide all fieldsets tabs
    $(".tab").css("display","none");    
    //display the first fieldset tab 
    $("#tab-1").css("display","block");
    
  
    //making of post request to registration controller
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
    
    
    //for switching between form fieldsets tabs and also validate form fieldsets in each tab
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
@extends('layout.main')

@section('page-content')
    <div class="banner-area auto-height text-color bg-gray inc-shape">
        <div class="item">
            <div class="container">
                <div class="row align-center">
                     
                    <div class="col-lg-6">
                        <div class="content">
                            <h4 class="wow fadeInUp">Helping to build</h4>
                            <h2 class="wow fadeInDown">Students’ capacity for the <strong>Industry and the Job market</strong></h2>
                            <p class="wow fadeInLeft">
                                We link students to the right job environment to acquire the appropriate and relevant skillset needed in their desired field of practice.
                            </p>
                            <a class="btn circle btn-theme effect btn-md wow fadeInUp" href="{{url('/login')}}">Start Now <i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 thumb">
                        <img class="wow fadeInUp" src="{{asset('assets/img/thumb/3.png')}}" alt="Thumb">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Star About Area
    ============================================= -->
    <div class="about-area inc-shape default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img src="{{asset('assets/img/2.jpg')}}" alt="Thumb">
                        <img src="{{asset('assets/img/home2.jpg')}}" alt="Thumb">
                       
                  
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 info">
                    <h2>We link students to the right job environment</h2>
                    <p>
                        The Groom+ platform is specifically designed to “GROOM” students for a specific industry they seek to venture into. Students take so many courses that gives them broader scope of understanding into many different areas. 
                    </p>
                    <p>
                        The Groom+ platform takes this to another level where we narrow down the skillset and give students specific training in the very area they intend to practice and build the specific industry needed skills.
                    </p>
                   
              
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <!-- Start Features 
    ============================================= -->
   {{--  <div class="features-area overflow-hidden bg-gray default-padding">
        <!-- Fixed Shpae  -->
        <div class="fixed-shape shape left bottom">
            <img src="{{asset('assets/img/shape/3.png')}}" alt="Shape">
        </div>
        <!-- End Fixed Shpae  -->
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5 why-us">
                    <h5>why choose us</h5>
                    <h2>Custom IT Solutions for Your Business</h2>
                    <p>
                        Carried nothing on am warrant towards. Polite in of in oh needed itself silent course. Assistance travelling so especially do prosperous appearance mr no celebrated. Wanted easily in my called formed suffer. Songs hoped sense as taken ye mirth at. Believe fat how six drawing pursuit minutes far. Same do seen head am part it dear open to Whatever.
                    </p>
                    
                </div>
                <div class="col-lg-7 features-box text-center">
                    <div class="row">

                        <!-- Item Grid -->
                        <div class="col-lg-6 col-md-6 item-grid">
                            <!-- Single Item -->
                            <div class="item">
                                <i class="flaticon-cogwheel"></i>
                                <h5><a href="#">IT Consultancy</a></h5>
                                <p>
                                     Astonished set expression solicitude way admiration
                                </p>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <i class="flaticon-globe-grid"></i>
                                <h5><a href="#">Cyber Security</a></h5>
                                <p>
                                     Astonished set expression solicitude way admiration
                                </p>
                            </div>
                            <!-- End Single Item -->
                        </div>
                        <!-- End Item Grid -->

                        <!-- Item Grid -->
                        <div class="col-lg-6 col-md-6 item-grid">
                            <!-- Single Item -->
                            <div class="item">
                                <i class="flaticon-cloud-storage"></i>
                                <h5><a href="#">Cloud Computing</a></h5>
                                <p>
                                     Astonished set expression solicitude way admiration
                                </p>
                            </div>
                            <!-- End Single Item -->
                            <!-- Single Item -->
                            <div class="item">
                                <i class="flaticon-backup"></i>
                                <h5><a href="#">Backup & Recovery</a></h5>
                                <p>
                                     Astonished set expression solicitude way admiration
                                </p>
                            </div>
                            <!-- End Single Item -->
                        </div>
                        <!-- End Item Grid -->

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    --}} <!-- End Features Area -->

    <div class="works-about-area overflow-hidden">
        <div class="container">
            <div class="works-about-items default-padding">
                <div class="row align-center">
                    <div class="col-lg-6 info">
                        <h5>About Us</h5>
                        <h2>Over 200+ companies OnBoard</h2>
                        <p>
                            We created this platform as a result of the overwhelming requests by students to undertake their internship with us. We researched and found that there are so many students who are unable to secure places for their internship. Likewise, there are so many organizations seeking students to undertake some internship with them.
                        </p>
                        
                        <a class="btn btn-theme effect btn-sm" href="{{url('/about-us')}}">Read more...</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb">
                            <img src="{{asset('assets/img/about.jpg')}}" alt="Thumb">
                            <div class="fun-fact">
                                <div class="timer" data-to="875" data-speed="5000"></div>
                                <span class="medium">Completed Projects</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Works About Area -->


    <!-- Start Work Process 
    ============================================= -->
    <div class="work-process-area overflow-hidden default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>Process</h4>
                        <h2>How It Works</h2>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container-full">
            <div class="work-pro-items">
                <div class="row">
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item" style="height:450px;">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-select"></i>
                                    <span>01</span>
                                </div>
                                <h5>Register </h5>
                                <p>
                                    Register on the platform with personal details such first name, middle name,last name , email ,contact .... 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item" style="height:450px;">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-strategy"></i>
                                    <span>02</span>
                                </div>
                                <h5>Receive Subscription Plan</h5>
                                <p>
                                     Receive the payment subscription plan through email or text message. Pay the required amount  
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item" style="height:450px;">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-video-call"></i>
                                    <span>03</span>
                                </div>
                                <h5>Get Notifications</h5>
                                <p>
                                    Get Realtime notification of internship opportunities from organizations on our mobile app.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                   
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item" style="height:450px;">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-help"></i>
                                    <span>04</span>
                                </div>
                                <h5>Apply To Organizations</h5>
                                <p>
                                    Apply to the Organizations who have internship opportunities open. Receive acceptance message from Organizations and begin internship. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Work Process Area -->

    <!-- Start Works About 
    ============================================= -->
    
    <!-- Start Services 
    ============================================= -->
   
    <!-- End Services Area -->

    <!-- Start Quick Contact Area
    ============================================= -->
    <div class="quick-contact-area half-bg default-padding">
        <div class="container">
            <div class="quick-contact-items shadow dark bg-cover text-light" style="background-image: url({{asset('assets/img/about2.jpg')}});">
                <div class="row align-center">
                    <div class="col-lg-8">
                        <h5>Need help?</h5>
                        <h2>Reach out to us NOW! Our Support Team is ready to attend to you!</h2>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a href="{{url('/contact')}}" class="btn btn-light effect btn-md">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Quick Contact Area -->

    <!-- Start Case Studies Area
    ============================================= -->
    <!-- End Case Studies Area -->

    <!-- Start Fun Factor Area
    ============================================= -->
    <!-- End Fun Factor Area -->

    <!-- Start Team 
    ============================================= -->
   
    <!-- End Team Area -->

    <!-- Start Faq 
    ============================================= -->
    <!-- End Faq Area -->

    <!-- Start Blog 
    ============================================= -->
   
@endsection
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
                        <img src="{{asset('assets/img/800x600.png')}}" alt="Thumb">
                        <img src="{{asset('assets/img/800x600.png')}}" alt="Thumb">
                  
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
    <div class="features-area overflow-hidden bg-gray default-padding">
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
    <!-- End Features Area -->

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
                        <div class="item">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-select"></i>
                                    <span>01</span>
                                </div>
                                <h5>Create Account</h5>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-video-call"></i>
                                    <span>02</span>
                                </div>
                                <h5>Request a Meeting</h5>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-strategy"></i>
                                    <span>03</span>
                                </div>
                                <h5>Receive Custom Plan</h5>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="single-item col-lg-3 col-md-6">
                        <div class="item">
                            <div class="item-inner">
                                <div class="icon">
                                    <i class="flaticon-help"></i>
                                    <span>04</span>
                                </div>
                                <h5>Let’s Make it Happen</h5>
                                <p>
                                    Arose mr rapid in so vexed words. Gay welcome led add lasting chiefly say looking better. 
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
    <div class="works-about-area overflow-hidden">
        <div class="container">
            <div class="works-about-items default-padding">
                <div class="row align-center">
                    <div class="col-lg-6 info">
                        <h5>Works About</h5>
                        <h2>Trusted by 5,000+ <br> Happy Customers</h2>
                        <p>
                             Jennings appetite disposed me an at subjects an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but why she shewing. She sang know now how nay cold real case. 
                        </p>
                        <ul>
                            <li>
                                <h5>100% Client Satisfaction</h5>
                            </li>
                            <li>
                                <h5>World Class Worker</h5>
                            </li>
                        </ul>
                        <a class="btn btn-theme effect btn-sm">Talk to a consultant</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb">
                            <img src="{{asset('assets/img/800x700.png')}}" alt="Thumb">
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

    <!-- Start Services 
    ============================================= -->
    <div class="services-area carousel-shadow default-padding-top bg-cover">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>Services</h4>
                        <h2>What we do</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="services-items services-carousel owl-carousel owl-theme text-center">
                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="flaticon-strategy"></i>
                    </div>
                    <div class="info">
                        <h4><a href="#">Business Reform</a></h4>
                        <p>
                            Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable.If miss part by fact he park
                        </p>
                        <a href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="flaticon-strategy"></i>
                    </div>
                    <div class="info">
                        <h4><a href="#">Business Reform</a></h4>
                        <p>
                            Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable.If miss part by fact he park
                        </p>
                        <a href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="flaticon-strategy"></i>
                    </div>
                    <div class="info">
                        <h4><a href="#">Business Reform</a></h4>
                        <p>
                            Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable.If miss part by fact he park
                        </p>
                        <a href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="flaticon-strategy"></i>
                    </div>
                    <div class="info">
                        <h4><a href="#">Business Reform</a></h4>
                        <p>
                            Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable.If miss part by fact he park
                        </p>
                        <a href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Single Item -->
                <!-- Single Item -->
                <div class="item">
                    <div class="icon">
                        <i class="flaticon-strategy"></i>
                    </div>
                    <div class="info">
                        <h4><a href="#">Business Reform</a></h4>
                        <p>
                            Necessary up knowledge it tolerably. Unwilling departure education is be dashwoods or an. Use off agreeable.If miss part by fact he park
                        </p>
                        <a href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
        <!-- Fixed Shpae Bottom -->
        <div class="fixed-shape-bottom">
            <img src="{{asset('assets/img/shape/1.svg')}}" alt="Shape">
        </div>
        <!-- Fixed Shpae Bottom -->
    </div>
    <!-- End Services Area -->

    <!-- Start Quick Contact Area
    ============================================= -->
    <div class="quick-contact-area half-bg default-padding-top">
        <div class="container">
            <div class="quick-contact-items shadow dark bg-cover text-light" style="background-image: url({{asset('assets/img/2440x1578.png')}});">
                <div class="row align-center">
                    <div class="col-lg-8">
                        <h5>Need help?</h5>
                        <h2>Easy solutions for all <strong>difficult IT problems</strong>, keep business safe & ensure high availability.</h2>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-light effect btn-md">Contact Us</a>
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
    <div class="team-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h4>Expert Team</h4>
                        <h2>Meet Our Leadership</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="team-items text-center">
                <div class="row">
                    <!-- Sngle Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('assets/img/800x800.png')}}" alt="Thumb">
                                <div class="social">
                                    <input type="checkbox" id="toggle" class="share-toggle" hidden>
                                    <label for="toggle" class="share-button">
                                        <i class="fas fa-plus"></i>
                                    </label>
                                    <a href="#" class="share-icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="share-icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-icon instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>Sporia Deko</h4>
                                <span>Marketing</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Sngle Item -->
                    <!-- Sngle Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('assets/img/800x800.png')}}" alt="Thumb">
                                <div class="social">
                                    <input type="checkbox" id="toggle-2" class="share-toggle" hidden>
                                    <label for="toggle-2" class="share-button">
                                        <i class="fas fa-plus"></i>
                                    </label>
                                    <a href="#" class="share-icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="share-icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-icon instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>Adhom Jonam</h4>
                                <span>Project Manager</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Sngle Item -->
                    <!-- Sngle Item -->
                    <div class="single-item col-lg-4 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('assets/img/800x800.png')}}" alt="Thumb">
                                <div class="social">
                                    <input type="checkbox" id="toggle-3" class="share-toggle" hidden>
                                    <label for="toggle-3" class="share-button">
                                        <i class="fas fa-plus"></i>
                                    </label>
                                    <a href="#" class="share-icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="share-icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-icon instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="info">
                                <h4>Emmanuel Gadasu</h4>
                                <span>CEO, Founder</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Sngle Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Area -->

    <!-- Start Faq 
    ============================================= -->
    <!-- End Faq Area -->

    <!-- Start Blog 
    ============================================= -->
   
@endsection
@extends('layout.main')

@section('page-content')

<div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url({{asset('assets/img/services.jpg')}});">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6">
                <h2>Services</h2>
            </div>
            <div class="col-lg-6 text-right">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Services 
============================================= -->

<div class="service-area default-padding bottom-less bg-cover">



    <div class="container">
        
        <div class="works-about-area reverse bg-gray overflow-hidden">
            <div class="container">
                <div class="works-about-items default-padding-bottom">
                    <div class="row align-center">
    
                        <div class="col-lg-6">
                            <div class="thumb">
                                <img src="{{asset('assets/img/services2.jpg')}}" alt="Thumb">
                                <div class="fun-fact">
                                    <div class="timer" data-to="200" data-speed="5000"></div>
                                    <span class="medium">Industry Practitioners OnBoard</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 info">
                       
                            <h2>Groom+</h2>
                            <p>
                                The Groom+ platform is specifically designed to <strong>“GROOM”</strong> students for a specific industry they seek to venture into. Students take so many courses that gives them broader scope of understanding into many different areas. The Groom+ platform takes this to another level where we narrow down the skillset and give students specific training in the very area they intend to practice and build the specific industry needed skills.
                            </p>
                            <p>
                                The trainings within this platform are carefully crafted and delivered by industry practitioners with considerable hands-on practical experience in their respective fields. They train and build capacity of the students using the very tools, technology, and components they use for their daily professional jobs.
                            </p>
                            
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>
<!-- End Services Area -->

<!-- Start Video Area 
============================================= -->
<!-- End Video Area -->

<!-- Start Why Choose Us 
============================================= -->

<!-- End Why Choose Us Area -->

@endsection
@extends('layout.main')
    <!-- End Header -->

@section('page-content')
    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area shadow dark bg-fixed text-light" style="background-image: url({{asset('assets/img/contact.jpg')}});">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Contact 
    ============================================= -->
    <div class="contact-area overflow-hidden default-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 contact-form-box">
                    <div class="content">
                        <div class="heading">
                            <h2>Contact US</h2>
                            <p>Reach out to us NOW! Our Support Team is ready to attend to you!</p>
                        </div>
                        <form action="assets/mail/contact.php" method="POST" class="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comments" name="comments" placeholder="Please describe what you need."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        Contact
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 info">
                    <div class="contact-tabs">
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="" data-target="#tab1" data-toggle="tab" class="active nav-link">
                                    Address
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#tab2" data-toggle="tab" class="nav-link">
                                    Google Maps
                                </a>
                            </li>
                        </ul>
                        <div id="tabsContent" class="tab-content">
                            <div id="tab1" class="tab-pane fade active show">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="info">
                                            <p>
                                                Our Location
                                                <span>  Ring Road West , Kwame Nkrumah Circle</span>
                                                  
                                                <span>Accra Digital Center , John Dramani Mahama Block</span>
                                                
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope-open"></i>
                                        </div>
                                        <div class="info">
                                            <p>
                                                Send Us Mail
                                                <span>info@internship.com.gh</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="info">
                                            <p>
                                                WhatsApp Us
                                                <span>+233 50 996 9914</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Start Footer 
    ============================================= -->
@endsection
<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default active-border navbar-sticky bootsnav">

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav inc-border">
                <ul>
                    <li class="contact">
                        <i class="flaticon-telephone"></i> 
                        <p>WhatsApp us today! <strong>+233 50 996 9914</strong></p>
                    </li>
                </ul>
            </div>        
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/img/logo.png')}}" class="logo " alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown">
                        <a href="{{url('/')}}" class="{{request()->is('/') ? 'active':''}}">Home</a>
                     
                    </li>
                    <li class="dropdown">
                        <a href="{{url('/about-us')}}" class="{{request()->is('about-us') ? 'active':''}}"  >About Us</a>
                      
                    </li>
                    <li class="dropdown">
                        <a href="{{url('/services')}}" class="{{request()->is('services') ? 'active':''}}"  >Services</a>
                       
                    </li>
                    <li class="dropdown">
                        <a href="{{url('/contact')}}" class="{{request()->is('contact') ? 'active':''}}"  >Contact</a>
                        
                    </li>
                    <li>
                        <a href="{{url('/login')}}"><i class="far fa-user"></i> Login </a>
                    </li>
                    <li class="dropdown">
                        <a href="/register" class="active" >Register</a>
                    
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </nav>
    <!-- End Navigation -->

</header>
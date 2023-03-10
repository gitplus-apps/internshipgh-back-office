<!doctype html>
<html lang="en" data-theme="dark">
<!-- Mirrored from clever-dashboard.webpixels.work/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:05:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
 
    <title>Internship - Ghana</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/utilities.css')}}"><!-- Google Tag Manager -->
    <link rel="icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <!-- End Google Tag Manager -->
    <script defer data-domain="webpixels.works" src="https://plausible.io/js/plausible.js"></script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        
        @include('includes.intern.sidebar')
        
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            @include('includes.intern.header')
            <header>
                <div class="container-fluid">
                    <div class="border-bottom pt-6">
                        <div class="row align-items-center">
                            <div class="col-sm col-12">
                                <h1 class="h2 ls-tight"><span class="d-inline-block me-3">👋</span>Hi, {{auth()->user()->username}}!</h1>
                            </div>
                           
                        </div>
                      
                    </div>
                </div>
            </header>
            
            @yield('content')
          
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
<!-- Mirrored from clever-dashboard.webpixels.work/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:06:53 GMT -->

</html>
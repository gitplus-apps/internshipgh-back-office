<!doctype html>
<html lang="en">
<!-- Mirrored from clever-dashboard.webpixels.work/pages/authentication/side-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:07:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Internship Ghana -  Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/utilities.css')}}"><!-- Google Tag Manager -->
    <link rel="icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
    <!-- End Google Tag Manager -->
    <script defer data-domain="webpixels.works" src="https://plausible.io/js/plausible.js"></script>
</head>

<body>
    <div>
    <div class="px-5 py-5 p-lg-0 h-screen bg-surface-secondary d-flex flex-column justify-content-center">
    <div class="d-flex justify-content-center">
    <div class="col-12 col-md-9 col-lg-6 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
    <div class="row">
    <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
    <div class="text-center mb-12">
    <a class="d-inline-block" href="#">
        <img src="{{asset('assets/img/logos/logo.png')}}" class="h-12"  width="200" height="90" alt="...">
        
    </a>
    <h1 class="ls-tight font-bolder mt-6">Create your account</h1>
    <p class="mt-2">It's free and easy</p>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-5">
            <label class="form-label" for="name">User Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required name="name" value="{{ old('name')}}">
            <div class="mt-1">
                  @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mb-5">
            <label class="form-label" for="email">Email address</label> 
            <input type="email" class="form-control" id="email" placeholder="Your email address" name="email" required value="{{old('email')}}">
            <div class="mt-1">
              @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mb-5">
            <label class="form-label" for="password">Password</label> 
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="current-password" required>
            <div class="mt-1">
                  @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
         <div class="mb-5">
            <label class="form-label" for="password">Confirm Password</label> 
            <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="current-password" required>
            <div class="mt-1">
                  @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mb-5">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check_example" id="check-remind-me" required> <label class="form-check-label font-semibold text-muted" for="check-remind-me">By creating an account means you agree to the Terms and Conditions, and our Privacy Policy
                </label>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary w-full">Register</button>
        </div>
    </form>
    <div class="py-5 text-center">
        <span class="text-xs text-uppercase font-semibold">or</span>
    </div>
    <div class="row g-3">
        <div class="col-sm-6">
            <a href="#" class="btn btn-neutral w-full">
                <span class="icon icon-sm pe-2"><img alt="..." src="{{asset('assets/img/social/github.svg')}}"> 
                </span>
                <span>Github</span>
            </a>
        </div>
    <div class="col-sm-6">
        <a href="#" class="btn btn-neutral w-full">
            <span class="icon icon-sm pe-2">
                <img alt="..." src="{{asset('assets/img/social/google.svg')}}"> 
            </span>
            <span>Google</span>
        </a>
    </div>
    </div>
    <div class="my-6">
    <small>Already have an account?</small> <a href="{{route('login')}}" class="text-danger text-sm font-semibold">Sign in</a></div></div></div></div></div></div></div>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
<!-- Mirrored from clever-dashboard.webpixels.work/pages/authentication/side-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:07:35 GMT -->

</html>
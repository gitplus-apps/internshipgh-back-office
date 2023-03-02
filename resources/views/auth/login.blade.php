<!doctype html>
<html lang="en">
<!-- Mirrored from clever-dashboard.webpixels.work/pages/authentication/side-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:07:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>Clever Dashboard | Made by Webpixels</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/utilities.css')}}"><!-- Google Tag Manager -->
   
    <!-- End Google Tag Manager -->
    <script defer data-domain="webpixels.works" src="https://plausible.io/js/plausible.js"></script>
</head>

<body>
    <div>
        <div class="px-5 py-5 p-lg-0 min-h-screen bg-surface-secondary d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
                <div
                    class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-primary d-none d-lg-flex flex-column">
                    <a class="d-block" href="#"><img src="{{asset('assets/img/logos/clever-light.svg')}}" class="h-10" alt="..."></a>
                    <div class="mt-32 mb-20">
                        <h1 class="ls-tight font-bolder display-6 text-white mb-5">Let’s build something amazing today.
                        </h1>
                        <p class="text-white text-opacity-80">Maybe some text here will help me see it better. Oh God.
                            Oke, let’s do it then.</p>
                    </div>
                    <div
                        class="w-56 h-56 bg-orange-500 rounded-circle position-absolute bottom-0 end-20 transform translate-y-1/3">
                    </div>
                </div>
                <div
                    class="col-12 col-md-9 col-lg-7 offset-lg-5 border-left-lg min-h-screen d-flex flex-column justify-content-center position-relative">
                    <div class="py-lg-16 px-lg-20">
                        <div class="row">
                            <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ms-xl-0">
                                <div class="mt-10 mt-lg-5 mb-6 d-lg-block"><span
                                        class="d-inline-block d-lg-block h1 mb-4 mb-lg-6 me-3">👋</span>
                                    <h1 class="ls-tight font-bolder h2">Nice to see you!</h1>
                                </div>
                                <form>
                                    <div class="mb-5"><label class="form-label" for="email">Email address</label> <input
                                            type="email" class="form-control" id="email"></div>
                                    <div class="mb-5">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div><label class="form-label" for="password">Password</label></div>
                                            <div class="mb-2"><a href="side-recover.html"
                                                    class="text-sm text-muted text-primary-hover text-underline">Forgot
                                                    password?</a></div>
                                        </div><input type="password" class="form-control" id="password"
                                            autocomplete="current-password">
                                    </div>
                                    <div class="mb-5">
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                name="check_example" id="check_example"> <label class="form-check-label"
                                                for="check_example">Keep me logged in</label></div>
                                    </div>
                                    <div><a href="#" class="btn btn-primary w-full">Sign in</a></div>
                                </form>
                                <div class="py-5 text-center"><span
                                        class="text-xs text-uppercase font-semibold">or</span></div>
                                <div class="hstack gap-4 justify-content-center"><a href="#"
                                        class="btn btn-lg btn-square btn-neutral"><span class="icon icon-sm"><img
                                                alt="..." src="{{asset('assets/img/social/github.svg')}}"> </span></a><a href="#"
                                        class="btn btn-lg btn-square btn-neutral"><span class="icon icon-sm"><img
                                                alt="..." src="{{asset('assets/img/social/google.svg')}}"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="position-lg-absolute bottom-0 end-0 my-8 mx-12 text-center text-lg-end"><small>Already
                            have an account?</small> <a href="side-register.html"
                            class="text-warning text-sm font-semibold">Sign up</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
<!-- Mirrored from clever-dashboard.webpixels.work/pages/authentication/side-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Nov 2022 07:07:35 GMT -->

</html>
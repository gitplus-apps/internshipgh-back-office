<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tanda - IT Solutions Template">

    <!-- ========== Page Title ========== -->
    <title>Internship - Ghana</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/style.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    
    {{-- Izitoast --}}
    <link rel="stylesheet" href="{{ asset('plugins/izitoast/css/iziToast.min.css')}}">
    <script src="{{ asset('plugins/izitoast/js/iziToast.min.js')}}" type="text/javascript"></script>
      {{-- Select2 --}}
      <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css')}}">
   
    <script src="{{ asset('plugins/select2/js/select2.full.js')}}" type="text/javascript"></script>
    
   
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->
  <script>
    var APP_URL = "{{ config('app.url') }}";
    $(document).ready(function() {
    
    //give all select2 a default placeholder
        $(".select2").select2({
          placeholder:{
            id: '-1',
            text: '-- select --'
          },
            width: '100%',
            selectOnClose: true
        });
    });
    @if (App::environment('production'))
        $(function () {
        var isCtrl = false;
        document.onkeyup = function (e) {
        if (e.which == 17) isCtrl = false;
        }
    
        document.onkeydown = function (e) {
        if (e.which == 17) isCtrl = true;
        if (e.which == 85 && isCtrl == true) {
        return false;
        }
        };
        $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
        return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode ==
        73) { // Prevent Ctrl+Shift+I
        return false;
        }
        });
        });
    
        document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
        });
        if ('matchMedia' in window) {
        // Chrome, Firefox, and IE 10 support mediaMatch listeners
        window.matchMedia('print').addListener(function (media) {
        if (media.matches) {
        beforePrint();
        } else {
        // Fires immediately, so wait for the first mouse movement
        $(document).one('mouseover', afterPrint);
        }
        });
        } else {
        // IE and Firefox fire before/after events
        $(window).on('beforeprint', beforePrint);
        $(window).on('afterprint', afterPrint);
        }
    
        function beforePrint() {
        $("#AllContent").hide();
        $(".PrintMessage").show();
        }
    
        function afterPrint() {
        $(".PrintMessage").hide();
        $("#AllContent").show();
        }
    @endif
</script>
</head>

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Internship Ghana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />


    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    
    <script>
        var APP_URL = "{{config('app.url')}}";
        const CREATEUSER = "{{Auth::user()->email}}";
    
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

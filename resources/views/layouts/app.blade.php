<!doctype html>
<html lang="en">

@include('includes.head')

<body data-sidebar="dark">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

   @include('includes.header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('includes.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        
        @yield('page-content')
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        ©
                        <script>document.write(new Date().getFullYear())</script> Gitplus Limited<span class="d-none d-sm-inline-block"> 
                            </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
@stack('scripts')

</body>

</html>
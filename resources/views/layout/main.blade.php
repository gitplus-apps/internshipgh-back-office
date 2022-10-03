<!DOCTYPE html>
<html lang="en">

@include('includes.head')
<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    @include('includes.navbar')
    
        @yield('page-content')
        
      
    @include('includes.footer')
</body>
</html>
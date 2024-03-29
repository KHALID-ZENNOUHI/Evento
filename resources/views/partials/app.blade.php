<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Evento')</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
    <!-- theme meta -->
    <meta name="theme-name" content="galaxy" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.css">

    <!-- Main Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

    <!--Favicon-->
    {{-- <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon"> --}}

</head>
<body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->
    
    <!-- START main-wrapper -->
    <section class="d-flex">
        <!-- start of sidenav -->
        @include('partials.sidenav')
        <!-- end of sidenav -->
        <!-- start of mobile-nav -->
        @include('partials.mobile-nav')
        <!-- end of mobile-nav -->

        @yield('content')
        {{-- @include('partials.search-form') --}}
    <!-- start of footer -->
        @include('partials.footer-block')
    <!-- end of footer -->
    </section>
    <!-- END main-wrapper -->

    <!-- All JS Files -->
    <script src="/plugins/jQuery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="/js/script.js"></script>
</body>
</html>
  

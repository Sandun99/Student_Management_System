<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | Student Management System</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <!-- All Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/educate-custon-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu/metisMenu-vertical.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/preloader/preloader-style.css')}}">


</head>

<body class="d-flex flex-column min-vh-100">

@include('partials.preloader')

{{-- Left Sidebar --}}
@include('partials.sidebar')

{{-- Main Content Wrapper --}}
<div class="all-content-wrapper flex-grow-1">

    {{-- Top Header / Navbar --}}
    @include('partials.header')

    {{-- Page Content (with safe top padding) --}}
    <main class="container-fluid pt-5 mt-4">
        @yield('content')
    </main>

{{--    <<div class="footer-copyright-area" style="background:#006DF0; color:#1f1f1f; padding:10px 0; position:fixed; bottom:0; width:100%; z-index:1000;">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 text-center">--}}
{{--                    <p class="mb-0">--}}
{{--                        Copyright © {{ date('Y') }}. All rights reserved.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

{{-- All JS Scripts --}}
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/js/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/counterup/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu/metisMenu-active.js') }}"></script>
<script src="{{ asset('assets/js/morrisjs/raphael-min.js') }}"></script>
<script src="{{ asset('assets/js/morrisjs/morris.js') }}"></script>
<script src="{{ asset('assets/js/morrisjs/morris-active.js') }}"></script>
<script src="{{ asset('assets/js/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/sparkline/sparkline-active.js') }}"></script>
<script src="{{ asset('assets/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/js/calendar/fullcalendar-active.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#menu1').metisMenu();

        @if(request()->routeIs('student.*'))
        $('#menu1 a:contains("Students")').click().attr('aria-expanded','true')
            .next('ul').addClass('in');
        @elseif(request()->routeIs('teacher.*'))
        $('#menu1 a:contains("Teachers")').click().attr('aria-expanded','true')
            .next('ul').addClass('in');
        @elseif(request()->routeIs('dashboard'))
        $('#menu1 a:contains("Education")').click().attr('aria-expanded','true')
            .next('ul').addClass('in');
        @elseif(request()->routeIs('course.*'))
        $('#menu1 a:contains("Courses")').click().attr('aria-expanded','true')
            .next('ul').addClass('in');
        @endif
    });
</script>

</body>
</html>

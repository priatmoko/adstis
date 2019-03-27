<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('css/loader.css')}}">
    </head>
    <body>
        <div class="preloader"  style='display:none;'>
            <div class="loader">
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>
            <div class="loader-msg" style='display:none;'>
                <div class="loader-msg-content"></div>
                <div class="loader-msg-dotted"></div>
            </div>
        </div>
        <div id="app">
            @yield('content')
        </div>        
        <!-- General JS Scripts -->
        <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
        <script src="{{asset('assets/modules/popper.js')}}"></script>
        <script src="{{asset('assets/modules/tooltip.js')}}"></script>
        <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/modules/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/stisla.js')}}"></script>
        <!-- JS Libraies -->
        <!-- Page Specific JS File -->
        <!-- Template JS File -->
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script src="{{asset('js/sLoader.js')}}"></script>
        @yield('scripts')
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/horizontal/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/horizontal/css/pages/pages.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/horizontal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/horizontal/css/spinners.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/horizontal/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    @yield('after-styles')
</head>
<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading mondly.challenge</p>
        </div>
    </div>

    @include("partials.header")

    @if(Route::current()->getName() == 'login' || Route::current()->getName() == 'register')
        @yield('content')
    @else
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.0/socket.io.js"></script>

    @yield('after-scripts')

    <script src="{{ asset('theme/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('theme/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/horizontal/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('theme/horizontal/js/waves.js') }}"></script>
    <script src="{{ asset('theme/horizontal/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('theme/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('theme/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('theme/horizontal/js/custom.min.js') }}"></script>
</body>
</html>

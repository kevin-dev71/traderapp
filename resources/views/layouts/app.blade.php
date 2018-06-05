<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TraderApp') }}</title>

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/dashboard/material-dashboard.css') }}" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/dashboard/demo.css') }}" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
</head>

<body>
<div class="wrapper">
    @yield('content')
</div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/dashboard/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/dashboard/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dashboard/material.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('js/dashboard/chartist.min.js') }}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ asset('js/dashboard/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ asset('js/dashboard/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/dashboard/bootstrap-notify.js') }}"></script>
<!--  Google Maps Plugin    -->
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/dashboard/material-dashboard.js?v=1.2.0') }}"></script>
@stack('scripts')

</html>
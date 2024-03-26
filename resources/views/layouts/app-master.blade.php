<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite([
        //'resources/sass/app.scss',
        //'resources/js/app.js',
         //'resources/css/style.css',
        //'resources/css/static_custom.css',
     ])

    <link rel="stylesheet" href="{{ asset("vendor/fontawesome/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/metisMenu/dist/metisMenu.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/animate.css/animate.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/bootstrap/dist/css/bootstrap.css") }}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset("fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css") }}" />
    <link rel="stylesheet" href="{{ asset("fonts/pe-icon-7-stroke/css/helper.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/custom_css.css") }}" />


    <!-- Scripts -->
    <style>
        .margin-bottom {
            margin-bottom: 10px;
        }
        .permission_title , .a_permission{
            display: flex;
            align-items: center;
        }

        .permission_title span{
            margin-left: 5px;
            font-size: 17px;
            font-weight: bold;
            padding: 0;
        }

        .a_permission span{
            margin-left: 5px;
            font-size: 15px;
            font-weight: normal;
            padding: 0;
        }

    </style>

</head>
<body class="light-skin fixed-navbar sidebar-scroll">
@yield('content')

<script src="{{ asset("vendor/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ asset("vendor/jquery-ui/jquery-ui.min.js") }}"></script>
<script src="{{ asset("vendor/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset("vendor/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("vendor/metisMenu/dist/metisMenu.min.js") }}"></script>
<script src="{{ asset("vendor/iCheck/icheck.min.js") }}"></script>
<script src="{{ asset("vendor/sparkline/index.js") }}"></script>

<!-- App scripts -->
<script src="{{ asset("scripts/homer.js") }}"></script>
<script src="{{ asset("scripts/charts.js") }}"></script>

@yield("scripts")

</body>
</html>

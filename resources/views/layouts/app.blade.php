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

    <link rel="stylesheet" href="{{ asset("vendor/fontawesome/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/metisMenu/dist/metisMenu.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/animate.css/animate.css") }}" />
    <link rel="stylesheet" href="{{ asset("vendor/bootstrap/dist/css/bootstrap.css") }}" />

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset("fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css") }}" />
    <link rel="stylesheet" href="{{ asset("fonts/pe-icon-7-stroke/css/helper.css") }}" />

    <link rel="stylesheet" href="{{ asset("styles/style.css") }}" />


</head>
<body class="light-skin blank">

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

</body>
</html>

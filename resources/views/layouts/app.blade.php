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

    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/vendor/fontawesome/css/font-awesome.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/vendor/metisMenu/dist/metisMenu.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/vendor/animate.css/animate.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/vendor/bootstrap/dist/css/bootstrap.css") }}" />



    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}

    <!-- App styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/fonts/pe-icon-7-stroke/css/helper.css") }}" />

    <link type="text/css" rel="stylesheet" href="{{ asset("vendor/homer/styles/style.css") }}" />
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />


</head>
<body class="light-skin blank">

      @yield('content')

       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/jquery/dist/jquery.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/jquery-ui/jquery-ui.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/slimScroll/jquery.slimscroll.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/bootstrap/dist/js/bootstrap.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/metisMenu/dist/metisMenu.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/iCheck/icheck.min.js") }}"></script>
       <script type="text/javascript" src="{{ asset("vendor/homer/vendor/sparkline/index.js") }}"></script>

       <!-- App scripts -->
       <script type="text/javascript" src="{{ asset("vendor/homer/scripts/homer.js") }}"></script>

{{--       <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>--}}
       <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

      <style type="text/css">

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

          @media (max-width: 767px) {
              .table-responsive .dropdown-menu {
                  position: static !important;
              }
          }
          @media (min-width: 768px) {
              .table-responsive {
                  overflow: inherit;
              }
          }

      </style>

      @yield("scripts")

</body>
</html>

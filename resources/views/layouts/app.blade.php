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

    @include('layouts.'.config('nisimpo_auth.theme').'_css_links')

</head>
<body class="light-skin blank pt-5">
    @if(Auth::check())
    <!-- Header -->
    @include("nisimpo::".config('nisimpo_auth.theme').".common.navbar")
    @include("nisimpo::".config('nisimpo_auth.theme').".common.sidebar")
    <!-- Navigation -->
    @endif
    <div class="page-wrapper">
        <div class="page-body pt-4">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/fc-5.0.0/fh-4.0.1/r-3.0.2/rr-1.5.0/sc-2.4.1/sl-2.0.1/sr-1.4.1/datatables.min.js"></script>
      <style type="text/css">

          .margin-bottom {
              margin-bottom: 10px;
          }
          .permission_title , .a_permission , .a_role , .check_inputs{
              display: flex;
              align-items: center;
          }

          .permission_title  span{
              margin-left: 5px;
              font-size: 17px;
              font-weight: bold;
              padding: 0;
          }

          .a_permission , .check_inputs span{
              margin-left: 5px;
              font-size: 15px;
              font-weight: normal;
              padding: 0;
          }

          .a_role span{
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

          .error-message{
              color: red;
          }

          .modal-header{
              padding: 10px !important;
              text-align: center;
          }

          .invalid-feedback strong {
              color: red;
          }

      </style>

      <script type="text/javascript">
          $(function (){
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                  }
              });


              // Toastr options
              toastr.options = {
                  "debug": false,
                  "newestOnTop": false,
                  "positionClass": "toast-top-right",
                  "closeButton": true,
                  "toastClass": "animated fadeInDown",
              };

          })
      </script>
      @yield("scripts")

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

          <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset('build/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/admin/vendors/base/vendor.bundle.base.css')}}">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{asset('build/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('build/admin/css/style.css')}}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{asset('build/admin/images/favicon.png')}}" />

        <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
        
    </head>
    <body>

        <div class="container-scroller">

               @include('layouts.inc.admin.navbar')

            <div class="container-fluid page-body-wrapper">

                @include('layouts.inc.admin.sidebar')

                <div class="main-panel">

                    <div class="content-wrapper">
                        @yield('content')
                    </div>

                </div>

            </div>

        </div>

                <!-- plugins:js -->
        <script src="{{asset('build/admin/vendors/base/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page-->
        {{-- <script src="vendors/chart.js/Chart.min.js"></script> --}}
        <script src="{{asset('build/admin/vendors/datatables.net/jquery.dataTables.j')}}s"></script>
        <script src="{{asset('build/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <!-- End plugin js for this page-->

        <!-- inject:js -->
        <script src="{{asset('build/admin/js/off-canvas.js')}}"></script>
        <script src="{{asset('build/admin/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('build/admin/js/template.js')}}"></script>
        <!-- endinject -->

        <!-- Custom js for this page-->
        <script src="{{asset('build/admin/js/dashboard.js')}}"></script>
        <script src="{{asset('build/admin/js/data-table.js')}}"></script>
        <script src="{{asset('build/admin/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('build/admin/js/dataTables.bootstrap4.js')}}"></script>
        <!-- End custom js for this page-->

        <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
       
        <script>
            $(document).ready( function () {
                $('#data-table').DataTable();
            } );
        </script>

        @livewireScripts
    </body>
    
</html>

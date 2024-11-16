<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')-Administración</title>
        <link rel="stylesheet" href="{{ asset('storage/css/admin.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
            rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">

    </head>

    <body>

        <div class="container-fluid h-100">
            <div class="row ">
                <!-- Sidebar -->
                <div class="col-2   shadow-lg" style="background-color:var( --primary-color);min-height: 100vh; overflow-y: auto;">
                    @include('layouts.admin.partials.sidebar')
                </div>
                <!-- End Sidebar -->

                <!-- Content -->
                <div class="col-10 back-premios p-0 m-0">                <!-- Top Navbar -->
                    @include('layouts.admin.partials.navbar')
                    <!-- End Top Navbar -->

                    <!-- Main Content -->
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- End Main Content -->
                </div>
                <!-- End Content -->
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>


        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });

        </script>


    </body>

</html>

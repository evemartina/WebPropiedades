<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')-Administración</title>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="icon"  href="{{ asset('favcon.svg') }}" type="image/svg+xml">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">

    </head>

    <body style="height: 100%">

        <div class="container-fluid h-100">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-2 shadow-lg  p-2 text-black bg-opacity-65" style="min-height: 100vh; height: inherit; overflow-y: auto;">
                    @include('layouts.admin.partials.sidebar')
                </div>
                <!-- End Sidebar -->

                <!-- Content -->
                <div class="col-10 ps-2 px-3 mt-5" >
                    <!-- Main Content -->
                        @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger mt-2">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    <!-- End Main Content -->
                </div>
                <!-- End Content -->
            </div>

        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    'language': {
                            info: 'Mostrando _PAGE_ de _PAGES_',
                            infoEmpty: 'No hay datos ',
                            infoFiltered: '(filtrado de _MAX_ total registro)',
                            lengthMenu: ' _MENU_ ',
                            search:'Buscar'
                        }
                    }

                );

                setTimeout(function() {
                        $(".alert").fadeOut(500, function() {
                            $(this).remove(); // Elimina el mensaje del DOM después de desvanecerlo
                        });
                    }, 5000); // 30 segundos
            });
        </script>

    </body>

</html>

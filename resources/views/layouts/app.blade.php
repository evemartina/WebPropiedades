<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Corredora de Propiedades</title>
    <meta name="description" content="Encuentra las mejores propiedades en venta y renta. Filtra por precio, dormitorios, y ubicación.">

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('favcon.svg') }}" type="image/svg+xml">



   <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css">


@yield('meta')
@yield('styles')




</head>
<body>

    <!-- Barra de navegación -->
    <header  class="bg-transparent  text-black" style="background-color: transparent !important;" >
        @include('layouts/partials.navbar')
    </header>

    <!-- Contenido principal -->
    <main>
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
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        @stack('footer')

        {{-- @include('layouts/partials.footer') --}}
    </footer>


    <!-- Bootstrap JS y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>



    <script>
         $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut(500, function() {
                    $(this).remove(); // Elimina el mensaje del DOM después de desvanecerlo
                });
            }, 5000); // 30 segundo
         });
    </script>
</body>
</html>

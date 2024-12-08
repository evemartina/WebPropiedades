<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Cargar los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Cargar otros estilos como el de tu fondo -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Aquí puedes agregar otros archivos CSS que necesites -->
</head>
<body>
    <!-- Contenedor principal que rodea todo el contenido -->
    <div class="d-flex align-items-center justify-content-center mt-5">
        @yield('content')
    </div>

    <!-- Cargar los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

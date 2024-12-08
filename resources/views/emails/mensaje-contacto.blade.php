<!-- resources/views/emails/mensaje.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Mensaje contacto  web ervinortizpropiedades.cl </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <p class="fw-3">Correo enviado por : {{$nombre}}</p>
    <p class="fw-3">Mensaje : {{ $mensaje }}</p>
    <p class="fw-3">Correo de contacto:  <a href="mailto:{{$cliente_email}}">{{$cliente_email}}</a></p>
</body>
</html>

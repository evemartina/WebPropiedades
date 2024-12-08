<!-- resources/views/emails/mensaje.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Mensaje Propiedad web ervinortizpropiedades.cl </title>
</head>
<body>
    <p class="fw-3 mb-2">Correo enviado por : {{$nombre}}</p>
    <p class="fw-3 mb-2">Mensaje : {{ $mensaje }}</p>
    <p class="fw-3 mb-2">Contactar al correo :     <a href="mailto:{{$cliente_email}}">{{$cliente_email}}"></a></p>
    <p class="fw-3 mb-2">Propiedad de Interes : <a href="{{ $link }}">{{ $link }}</a></p>
</body>
</html>

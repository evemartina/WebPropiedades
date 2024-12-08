@extends('layouts.app')

@section('title', $property->name)

@section('meta')
    <!-- Meta para Facebook (Open Graph) -->
    <meta property="og:title" content="{{ $property->nombre }}">
    <meta property="og:description" content="{{ $property->descripcion }}">
    <meta property="og:image" content="{{ asset($property->imagen_principal) }}">
    <meta property="og:url" content="{{ Request::fullUrl() }}">

    <!-- Meta para Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $property->nombre }}">
    <meta name="twitter:description" content="{{ $property->descripcion }}">
    <meta name="twitter:image" content="{{ asset($property->imagen_principal) }}">
    <meta name="twitter:url" content="{{ Request::fullUrl() }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/boton-social.css') }}">
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="container m-3">
        <a href="{{ url()->previous() }}" class="btn  text-white  pt-0 pb-0" style="background-color: #7978e9">
            <i class="bi bi-arrow-left display-5"></i>
        </a>
    </div>
    <div class="container">

        <h1 class="fw-bold mb-4">{{ $property->nombre }}</h1>

        <div class="col-12">
            <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item ">
                        <img src="{{ asset($property->imagen_principal) }}" class="d-block w-100 img-carousel"
                            alt="Imagen de la propiedad">
                    </div>
                    @foreach ($property->images as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset($image->imagen) }}" class="d-block w-100 img-carousel" alt="Imagen de la propiedad">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row">

            <!-- Detalles de la propiedad -->
            <div class="col-lg-8 col-md-12 mb-4">
                <div class="amenities mt-2 d-flex justify-content-left align-items-center">
                    @if (isset($property->habitaciones))
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{ asset('images/icons/dormitorio.png') }}" class="icono" alt="Habitaciones"
                                title="Habitaciones" />
                            <span>{{ $property->habitaciones }}</span>
                        </span>
                    @endif
                    @if ($property->banos > 0)
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{ asset('images/icons/bano.png') }}" class="icono" alt="Baños"
                                title="Baños" />
                            <span>{{ $property->banos }}</span>
                        </span>
                    @endif
                    @if ($property->metros_totales > 0)
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{ asset('images/icons/area.png') }}" class="icono" alt="Metros Totales"
                                title="Metros Totales" />
                            <span>{{ $property->metros_totales }} m²</span>
                        </span>
                    @endif
                    @if ($property->metros_construidos > 0)
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{ asset('images/icons/area.png') }}" class="icono" alt="Metros COnstruidos"
                                title="Metros Construidos" />
                            <span>{{ $property->metros_construidos }} m²</span>
                        </span>
                    @endif
                </div>
                <p><strong>Orientacion:</strong> {{ $property->orientacion }}</p>
                <p><strong>Operacion:</strong> {{ $property->operacion }}</p>
                <p><strong>Precio:</strong> ${{ number_format($property->precio, 0, '', '.') }}</p>
                @if ($property->gastos_comunes > 0)
                    <p><strong>Gastos Comunes:</strong> {{ $property->gastos_comunes }}</p>
                @endif
                <p><strong>Ubicación:</strong> {{ $property->direccion }}</p>

                @if ($property->estacionamiento > 0)
                    <p><strong>Estacionamiento:</strong> {{ $property->estacionamiento }}</p>
                @endif
                @if ($property->bodega > 0)
                    <p><strong>bodega:</strong> {{ $property->bodega }}</p>
                @endif


                <p class="mb-3 fw-light fst-italic lh-base">{{ $property->descripcion }}</p>

            </div>

            <div class="col-lg-4 col-md-12 mb-3 justify-content-center mb-4 mt-4">
                <!-- Botones para compartir en redes sociales -->
                <h3 class="fw-bold mb-3">Comparte esta propiedad <i class="bi bi-share-fill "></i>
                </h3>
                <div class="social-buttons d-flex flex-wrap gap-2 mb-4 pb-4 mx-3">

                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                        target="_blank" class="btn btn-social btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode('Revisa esta propiedad ' . $property->nombre . ' en: ') }}{{ '&url=' . urlencode(Request::fullUrl()) }}"
                        target="_blank" class="btn btn-social btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text= Revisa esta propiedad {{ $property->nombre }} en :{{ urlencode(Request::fullUrl()) }}"
                        target="_blank" class="btn btn-social btn-whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                </div>

                <!-- Formulario de contacto -->
                <h3 class="mt-4">Contáctanos</h3>
                <form action="{{ route('enviarCorreoPropiedad') }}" method="POST" id="contact-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mensaje">Mensaje:</label>
                        <textarea name="mensaje" id="mensaje" class="form-control" rows="5" required></textarea>
                    </div>
                    <input type="hidden" name="link" id="link" value="{{ url()->current() }}">

                    <div class="row justify-content-center">
                        <!-- Columna para el botón de envío -->
                        <div class="col-6 d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <button type="submit" id="envio-form" class="btn btn-primary">Enviar mensaje</button>
                        </div>

                        <!-- Columna para el ícono de WhatsApp -->
                        <div class="col-6 d-flex justify-content-center align-items-center">

                            <a id="whatsappLink" href="#" target="_blank" title="Contactar por Whatsapp ">
                                <i class="bi bi-whatsapp display-5 text-success"></i>
                            </a>
                        </div>
                    </div>




                </form>
            </div>

            <div class="col-12 m-3">
                <div id="map" style="height: 400px;width:100%" class="w-100"></div>

            </div>
        </div>
    </div>
    <div class="container m-3">
        <a href="{{ url()->previous() }}" class="btn  text-white  pt-0 pb-0" style="background-color: #7978e9">
            <i class="bi bi-arrow-left display-5"></i>
        </a>
    </div><!-- Cargar la API de Google Maps -->
    <script async
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap">
    </script>

    <!-- Código JavaScript para inicializar el mapa -->
    <script>
        // Define la función initMap globalmente
        function initMap() {
            var latitude = {{ $property->lat }};
            var longitude = {{ $property->lng }};

            // Coordenadas de la propiedad
            var propertyLocation = {
                lat: latitude,
                lng: longitude
            };

            // Inicializar el mapa en las coordenadas
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: propertyLocation
            });

            // Colocar el marcador en las coordenadas
            var marker = new google.maps.Marker({
                position: propertyLocation,
                map: map
            });
        }
    </script>

    <!-- Contenedor donde se mostrará el mapa -->
    <div id="map" style="height: 400px; width: 100%;"></div>


    <script>
        $('#contact-form').on('submit', function(e) {
            e.preventDefault(); // Evitar el envío normal del formulario
            var submitButton = $('#envio-form'); // Asume que tu botón de envío tiene el ID 'enviar-btn'
            submitButton.prop('disabled', true);


            Swal.fire({
                title: 'Enviando...',
                text: 'Por favor espera mientras procesamos tu solicitud.',
                icon: 'info',
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading(); // Muestra el loading spinner
                }
            });


            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Envio de Correo',
                        text: response.status,
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        $('#contact-form')[0].reset();
                        submitButton.prop('disabled', false);

                    });

                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.status ||
                            'Ocurrió un error al enviar el correo.',
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        // Habilita el botón nuevamente
                        submitButton.prop('disabled', false);
                    });
                }
            });
        });


        $('#whatsappLink').on('click', function(event) {
            event.preventDefault();
            let mensaje = $("#mensaje").val();
            let link = $('#link').val();

            if(!mensaje){
                mensaje = "Hola, me interesa esta propiedad y quiero conocer más detalles.";
            }

            let mensajeFinal = `${mensaje} %0A${link}`;
            let mensajeCodificado = encodeURIComponent(mensajeFinal);

            let whatsappUrl = `https://wa.me/56932400387?text=${mensajeCodificado}`;

            window.open(whatsappUrl, '_blank'); // Abre en una nueva ventana
        });
    </script>

@endsection
@push('footer')
    @include('layouts.partials.footer', ['info' => $info])
@endpush

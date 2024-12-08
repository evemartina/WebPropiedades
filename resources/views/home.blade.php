@extends('layouts.app')

@section('title', 'Inicio')

@section('content')


<section class="hero-home">
    <div class="container-fluid ">
        @include('propiedades.carrusel-home')
    </div>
</section>

<section class="featured-properties">
    <div class="container">
        <h2 class="display-3 mb-3 text-center fw-bold" >Propiedades Destacadas</h2>
        @include('propiedades.filtro-pro')

        <div id="properties-list">
            @include('propiedades.lista-destacado', ['properties' => $properties])
        </div>

    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $('.filterForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route("properties.filter") }}',
            type: 'GET',
            data: $(this).serialize(),
            success: function(response) {
                $('#properties-list').html(response);
            },
            error: function() {
                alert('Error al filtrar propiedades');
            }
        });
    });

    $('#clearFilters').on('click', function() {

        $('#form-filter')[0].reset();
        let ope = $('#operacion :selected').val();
        let prop_types = $('#property_types :selected').val();

        $.ajax({
            url: '{{ route("properties.filter") }}',
            type: 'GET',
            data: {operacion:ope,property_types:prop_types},
            success: function(response) {
                $('#properties-list').html(response);
            },
            error: function() {
                alert('Error al cargar todas las propiedades');
            }
        });
    });
</script>

@endsection
@push('footer')
    @include('layouts.partials.footer', ['info' => $info])
@endpush

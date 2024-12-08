@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <h3 class="display-4 mx-5 px-3">Propiedades</h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('properties.create')}}" class="btn btn-primary m-3 p-3">Crear nueva propiedad</a>
        </div>
        <!-- Agregado table-responsive para hacer la tabla más responsiva en móviles -->   <div class=" table-responsive" id="tabla_propiedades">
            @include('properties.partials.tabla_propiedades')
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function cambia(id) {
            $.ajax({
                url: `{{ route('properties.cambiarEstado', ':id') }}`.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Éxito',
                        text: 'Estado actualizado correctamente.',
                        icon: 'success'
                    }).then(() => {
                        // Opción de recargar tabla
                    });
                },
                error: function(xhr) {
                    Swal.fire('Error', 'Hubo un error al cambiar el estado.', 'error');
                }
            });
        }
    </script>
@endsection

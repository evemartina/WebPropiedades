@extends('layouts.admin')

@section('content')
<div class="container">

    <a href="javascript:void(0);" class="btn btn-primary mb-3" onclick="cargarForm( 'create',0)">Crear nueva propiedad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive m-3 p-2">
        <table class=" table table-striped table-hover table-bordered" id="dataTable" width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo de Inmueble</th>
                    <th>Operacion</th>
                    <th>Precio</th>
                    <th>Ubicación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->nombre }}</td>
                        <td>{{ $property->type->name}}</td>
                        <td>{{$property->operacion}}</td>
                        <td>${{ number_format($property->precio) }}</td>
                        <td>{{ $property->direccion }}</td>

                        {{-- <td>
                            {!! QrCode::size(70)->generate(route('listings', $property->id)) !!}
                            </td> --}}

                        <td>
                            <!-- Botón para eliminar propiedad -->
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>

                                </div>
                            </form>
                        </td>
                        <td> <button class="btn " type="button" onclick="cargarForm( 'edit',{{$property->id}})">Editar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    function cargarForm( tipo,id) {

        let url = '';


        if (tipo === 'create') {
            url ='{{ route("properties.create") }}';
        } else if (tipo === 'edit') {
            url = `{{ route('properties.edit', ':id') }}`.replace(':id', id)
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                // Llamar a SweetAlert2 con la respuesta en el body
                Swal.fire({

                    html: response,
                    width:'85%',
                    padding:'3rem',
                    showConfirmButton: false,
                    showCloseButton: true, // Mostrar el botón "X" para cerrar
                    showClass: {
                        popup: 'animate__animated animate__fadeIn' // Efecto suave de entrada
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOut' // Efecto suave de salida
                    }

                });
            },
            error: function(xhr, status, error) {
                // En caso de error, mostrar un mensaje de error en el modal
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudo obtener la información.'+error,
                    icon: 'error'
                });
            }
        });



    }
</script>
@endsection

@extends('layouts.admin')

@section('title', 'DashBoard')

@section('content')



<div class="container-fluid">

    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Usuarios Activos</div>
                <div class="card-body">
                    <h3 class="card-title fw-bold">4</h3>
                    <p class="card-text">Total Usuarios activos</p>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Actividades</div>
                <div class="card-body">
                    <h3 class="card-title fw-bold">4</h3>
                    <p class="card-text">Total actividades</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Tutoriales</div>
                <div class="card-body">
                    <h3 class="card-title fw-bold">9</h3>
                    <p class="card-text">Total tutoriales</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Convocatorias</div>
                <div class="card-body">
                    <h3 class="card-title fw-bold">7</h3>
                    <p class="card-text">Total convocatorias</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Eventos</div>
                <div class="card-body">
                    <h3 class="card-title fw-bold">24</h3>
                    <p class="card-text">Total eventos</p>
                </div>
            </div>
        </div>


        <!-- Agrega más tarjetas según sea necesario -->

        <div class="col-md-12 mt-4">
            <h2 class="text-center m-3 p-2">Ultimos Propiedades Publicadas</h2>
            <table class="table table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo de Propiedad</th>
                        <th>Operacion</th>
                        <th>Ubicacion</th>
                        <th>Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->nombre }}</td>
                        <td>{{ $property->type->name }}</td>
                        <td>{{ $property->operacion }}</td>
                        <td>{{ $property->direccion }}</td>

                        <td>{{ $property->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

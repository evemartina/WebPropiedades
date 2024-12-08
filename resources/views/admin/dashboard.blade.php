@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Row for General Statistics -->
       @include('admin.estadisticas_tarjetas')

        <!-- Row for Charts and Graphs -->

        @include('admin.graficos')
        <!-- Tabla de Propiedades Más Vistas -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Propiedades Más Vistas</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre de la Propiedad</th>
                                    <th>Visualizaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($mostViewedProperties)
                                    @foreach ($mostViewedProperties as $property)
                                        <tr>
                                            <td>{{ $property->nombre }}</td>
                                            <td>{{ $property->visitas }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

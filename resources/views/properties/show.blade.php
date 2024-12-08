@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="display-3 fw-bold mb-4">Propiedad: {{ $property->nombre }}</h1>
        <div class="row">
            <div class="col-4">
                <p class="fw-bold"> Valor UF: {{ number_format( $valorUF,2, '', '.')}}
            </div>
            <div class="col-4">
                <p class="fw-bold"> Valor m2 $ : {{ number_format($valorMetroCuadradoPesos,2, ',', '.')}}</p>
            </div>
            <div class="col-4">
                <p class="fw-bold"> Valor m2 UF :{{ number_format($valorMetroCuadradoUF,2, ',', '.')}}</p>

            </div>

        </div>
        <div class="row">
            <!-- Columna de Datos de la Propiedad -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h4>Detalles de la Propiedad</h4>
                        <hr>

                        <div class="row mb-3">
                            <!-- Imagen principal -->
                            <div class="col-12 col-md-4 mb-3">
                                <img src="{{ asset($property->imagen_principal) }}" class="img-fluid img-thumbnail" alt="Imagen de la propiedad">
                            </div>

                            <!-- Imágenes adicionales -->
                            @foreach ($property->images as $index => $image)
                                <div class="col-6 col-md-4 mb-3">
                                    <img src="{{ asset($image->imagen) }}" class="img-fluid img-thumbnail" alt="Imagen de la propiedad">
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <strong>Habitaciones:</strong> {{ $property->habitaciones }}
                                </div>
                                <div class="mb-2">
                                    <strong>Baños:</strong> {{ $property->banos }}
                                </div>
                                <div class="mb-2">
                                    <strong>Metros Totales:</strong> {{ $property->metros_totales }} m²
                                </div>
                                <div class="mb-2">
                                    <strong>Metros Construidos:</strong> {{ $property->metros_construidos }} m²
                                </div>
                                <div class="mb-2">
                                    <strong>Ubicación:</strong> {{ $property->direccion }}
                                </div>
                                <div class="mb-2">
                                    <strong>Estacionamiento:</strong> {{ $property->estacionamiento }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <strong>Orientación:</strong> {{ $property->orientacion }}
                                </div>
                                <div class="mb-2">
                                    <strong>Operación:</strong> {{ $property->operacion }}
                                </div>
                                <div class="mb-2">
                                    <strong>Precio:</strong> ${{ number_format($property->precio, 0, '', '.') }}
                                </div>
                                <div class="mb-2">
                                    <strong>Gastos Comunes:</strong> {{ $property->gastos_comunes }}
                                </div>
                                <div class="mb-2">
                                    <strong>Bodega:</strong> {{ $property->bodega }}
                                </div>

                            </div>
                        </div>
                        <!-- Información de la propiedad -->
                        <div class="mb-3">
                            <strong>Descripción:</strong> <p>{{ $property->descripcion }}</p>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Columna de Cambios -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>Cambios Recientes</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive table-sm">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Cambio </th>
                                        <th>Anterior</th>
                                        <th>Nuevo</th>
                                        <th>Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($property->changeLogs as $log)
                                    <tr>
                                        <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-capitalize">{{ $log->change_type }}</td>
                                        <td>
                                            @if($log->change_type == 'estado')
                                                <!-- Array asociativo para los estados -->
                                                @php
                                                    $estado_map = [
                                                        1 => 'Publicado',
                                                        0 => $property->operacion == 'venta' ? 'Vendido' : ($property->operacion == 'arriendo' ? 'Arrendado' : 'No disponible')
                                                    ];
                                                @endphp
                                                {{ $estado_map[$log->old_value] ?? 'Desconocido' }}
                                            @elseif($log->change_type == 'precio')
                                                <!-- Lógica para el cambio de precio -->
                                                ${{ number_format($log->old_value, 0, '', '.') }}
                                            @elseif($log->change_type == 'otros')
                                                <!-- Lógica para otros cambios -->
                                                {{ $log->old_value }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($log->change_type == 'estado')
                                                <!-- Mismo array asociativo para el estado nuevo -->
                                                {{ $estado_map[$log->new_value] ?? 'Desconocido' }}
                                            @elseif($log->change_type == 'precio')
                                                <!-- Lógica para el cambio de precio -->
                                                ${{ number_format($log->new_value, 0, '', '.') }}
                                            @elseif($log->change_type == 'otros')
                                                <!-- Lógica para otros cambios -->
                                                {{ $log->new_value }}
                                            @endif
                                        </td>
                                        <td>{{ $log->user->name ?? 'Usuario desconocido' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h4 class="text-center">QR Propiedad</h4>
                        <hr>
                        <div class="text-center img-fluid mb-4">
                            {!! QrCode::size(200)->generate(route('listings.show',$property->id)) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

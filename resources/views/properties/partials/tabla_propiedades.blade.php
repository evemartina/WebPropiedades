<table class="table table-striped table-hover table-bordered table-responsive table-sm" id="dataTable" width="100%">
    <thead>
        <tr>
            <th>Cod.</th>
            <th>Nombre</th>
            <th>Tipo de Inmueble</th>
            <th>Operación</th>
            <th>Precio</th>
            <th>Ubicación</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property)
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->nombre }}</td>
                <td>{{ $property->type->name }}</td>
                <td>{{ $property->operacion }}</td>
                <td>${{ number_format($property->precio, 0, '', '.'); }}</td>
                <td>{{ $property->direccion }}</td>
                <td class="text-center">
                    <div class="form-check form-switch d-flex justify-content-center">
                        <input class="form-check-input" type="checkbox" onclick="cambia({{ $property->id }})"
                            @if ($property->estado) checked @endif>
                    </div>
                </td>
                <td class="text-center">
                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

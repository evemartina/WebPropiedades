@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="mb-5 pb-3 text-center">
            <h1 class="display-4 fw-bold">{{ isset($property) ? 'Editar Propiedad' : 'Agregar Propiedad' }}</h1>
        </div>

        <form action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" method="POST" enctype="multipart/form-data" id="property-form">
            @csrf
            @if (isset($property))
                @method('PUT')
            @endif
            <p class="d-flex justify-content-start m-3">(<span class="text-danger">*</span>) campos obligatorios</p>

            <!-- Nombre -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="nombre" class="p-2 fw-bold">Nombre (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $property->nombre ?? '') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Descripción -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="descripcion" class="p-2 fw-bold">Descripción (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $property->descripcion ?? '') }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Operación -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="operacion" class="p-2 fw-bold">Operación (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="form-select" id="operacion" name="operacion">
                        <option value="">Seleccione Operación</option>
                        <option value="venta" @if (isset($property) && $property->operacion == 'venta') selected @endif>Venta</option>
                        <option value="arriendo" @if (isset($property) && $property->operacion == 'arriendo') selected @endif>Arriendo</option>
                    </select>
                    @error('operacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Tipo de propiedad -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="property_type_id" class="p-2 fw-bold">Tipo de Propiedad (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="form-select" id="property_type_id" name="property_type_id">
                        <option value="">Seleccione Tipo de Propiedad</option>
                        @foreach ($propertyTypes as $tipo)
                            <option value="{{ $tipo->id }}" @if (isset($property) && $property->property_type_id == $tipo->id) selected @endif>{{ $tipo->name }}</option>
                        @endforeach
                    </select>
                    @error('property_type_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Precio -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="precio" class="p-2 fw-bold">Precio ($CLP) (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio', $property->precio ?? '') }}">
                    @error('precio')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="city_id" class="p-2 fw-bold">Ciudad (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="form-select" id="city_id" name="city_id" required>
                        <option value="">Seleccione Ciudad</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}" @if (isset($property) && $property->city_id == $ciudad->id) selected @endif>{{ $ciudad->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Dirección -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="direccion" class="p-2 fw-bold">Dirección (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $property->direccion ?? '') }}">
                    @error('direccion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="orientacion">Orientacion</label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="text" name="orientacion" id="orientacion" class="form-control"
                        value="{{ old('orientacion', $property->orientacion ?? '') }}">
                    @error('orientacion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="antiguedad">Antiguedad</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="antiguedad" id="antiguedad" class="form-control"
                        value="{{ old('antiguedad', $property->antiguedad ?? '0') }}">
                    @error('antiguedad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="habitaciones">Dormitorios</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="habitaciones" id="habitaciones" class="form-control"
                        value="{{ old('habitaciones', $property->habitaciones ?? '0') }}">
                    @error('habitaciones')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="banos">Baños</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="banos" id="banos" class="form-control"
                        value="{{ old('banos', $property->banos ?? '0') }}">
                    @error('banos')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="bodega">Bodega</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="bodega" id="bodega" class="form-control"
                        value="{{ old('bodega', $property->bodega ?? '0') }}">
                    @error('bodega')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="estacionamiento">Estacionamientos</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="estacionamiento" id="estacionamiento" class="form-control"
                        value="{{ old('estacionamiento', $property->estacionamiento ?? '0') }}">
                    @error('estacionamiento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <!-- Metros Totales -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="metros_totales" class="p-2 fw-bold">Metros Totales (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" name="metros_totales" id="metros_totales" class="form-control" value="{{ old('metros_totales', $property->metros_totales ?? '') }}">
                    @error('metros_totales')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row  mb-4">
                <div class="col-6 col-md-3">
                    <label class="p-2 fw-bold" for="metros_contruidos">Metros Contruidos</label></label>
                </div>
                <div class="col-6 col-md-9">
                    <input type="number" name="metros_contruidos" id="metros_contruidos" class="form-control"
                        value="{{ old('metros_contruidos', $property->metros_contruidos ?? '0') }} ">
                    @error('metros_contruidos')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>



            <!-- Imagen Principal -->
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <label for="imagen_principal" class="p-2 fw-bold">Imagen Principal (<span class="text-danger">*</span>)</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" name="imagen_principal" id="imagen_principal" class="form-control-file">
                    @error('imagen_principal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if (isset($property) && $property->imagen_principal)
                        <div class="col m-5">
                            <img src="{{ asset($property->imagen_principal) }}" alt="{{ $property->nombre }}" class="img-thumbnail img-fluid">
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mb-4">
                <!-- Etiqueta de las imágenes -->
                <div class="col-12 col-md-3">
                    <label for="imagen_principal" class="p-2 fw-bold">Imágenes Adicionales (<span class="text-danger">*</span>)</label>
                </div>

                <!-- Input para cargar imágenes adicionales -->
                <div class="col-12 col-md-9">
                    <input type="file" name="imagenes_adicionales[]" multiple class="form-control">

                    <!-- Mostrar imágenes si ya existen (si es edición) -->
                    @if (isset($property) && $property->images->count())
                        <div class="row g-4 mt-4">
                            @foreach ($property->images as $image)
                                <div class="col-4">
                                    <img src="{{ asset($image->imagen) }}" alt="{{ $property->nombre }}" class="img-thumbnail ">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Botón Guardar/Actualizar -->
            <div class="d-flex justify-content-center m-3">
                <button type="submit" class="btn btn-{{ isset($property) ? 'danger' : 'primary' }}">
                    {{ isset($property) ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4/dist/autoNumeric.min.js"></script>
<script>
    const priceField = new AutoNumeric('#precio', {
        currencySymbol: '$',
        decimalPlaces: 0,
        decimalCharacter: ',',
        digitGroupSeparator: '.',
        minimumValue: '0',
        modifyValueOnWheel: false
    });
    document.getElementById('property-form').addEventListener('submit', function() {
        priceField.unformat();  // Convierte el valor a un número sin formato
    });
</script>
@endsection


<div class="container">

    <h1 class="h3 mb-4">{{  isset($property)  ? 'Editar Propiedad' : 'Agregar Propiedad' }}</h1>

    <form action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($property) )
            @method('PUT')
        @endif

        <div class="row  mb-4">
            <div class="col-3">
                <label class="p-2" for="nombre">Nombre</label>
            </div>
            <div class="col-9">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $property->nombre ?? '') }}" required>
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>



        <div class="form-group m-3">
            <label class="p-2" for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $property->description ?? '') }}</textarea>
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="property_type">Tipo de Propiedad</label>
            <select class="form-select" id="property_type_id" name="property_type_id" aria-label="property_type_id" required>
                <option value="">Seleccione tipo de Propiedad</option>
                @foreach ($propertyTypes as $tipo)
                    <option value="{{ $tipo->id }}"
                        @if (isset($property) && $property->property_type_id == $tipo->id)
                            selected
                        @endif>
                        {{ $tipo->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="precio">Precio ($CLP)</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $property->precio ?? '') }}" required>
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ old('ubicacion', $property->ubicacion ?? '') }}" required>
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="orientacion">Orientacion</label>
            <input type="text" name="orientacion" id="orientacion" class="form-control" value="{{ old('orientacion', $property->orientacion ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="antiguedad">Antiguedad</label></label>
            <input type="number" name="antiguedad" id="antiguedad" class="form-control" value="{{ old('antiguedad', $property->antiguedad ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="banos">Baños</label></label>
            <input type="number" name="banos" id="banos" class="form-control" value="{{ old('banos', $property->banos ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="bodega">Bodega</label></label>
            <input type="number" name="bodega" id="bodega" class="form-control" value="{{ old('bodega', $property->bodega ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="estacionamiento">Estacionamientos</label></label>
            <input type="number" name="estacionamiento" id="estacionamiento" class="form-control" value="{{ old('estacionamiento', $property->estacionamiento ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="metros_totales">Metros Totales</label></label>
            <input type="number" name="metros_totales" id="metros_totales" class="form-control" value="{{ old('metros_totales', $property->metros_totales ?? '') }}" >
        </div>

        <div class="form-group m-3">
            <label class="p-2" for="metros_contruidos">Metros Contruidos</label></label>
            <input type="number" name="metros_contruidos" id="metros_contruidos" class="form-control" value="{{ old('metros_contruidos', $property->metros_contruidos ?? '') }}" >
        </div>








        <div class="form-group m-3">
            <label class="p-2" for="image">Imagen Principal</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
            @if(isset($property) &&  $property->image)
                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->nombre }}" class="img-fluid mt-3" width="150">
            @endif
        </div>
        <div class="form-group m-3">
            <label class="p-2" for="image">Imagen Adisionales</label>
            <input type="file" name="imagenes_adicionales[]" multiple>
            @if(isset($property) &&  $property->image)
                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->nombre }}" class="img-fluid mt-3" width="150">
            @endif
        </div>



        <button type="submit" class="btn btn-{{ isset($property) ? 'warning' : 'primary' }}">{{ isset($property) ? 'Actualizar' : 'Agregar' }} Propiedad</button>
    </form>

</div>

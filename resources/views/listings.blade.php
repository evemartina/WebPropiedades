@extends('layouts.app')

@section('title', 'Propiedades')

@section('content')

<section class="property-listings">
    <div class="container">
        <h2>Propiedades en Venta</h2>

        <!-- Barra de búsqueda y filtros -->
        <form action="{{ route('listings.search') }}" method="GET" class="search-filters">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="location" placeholder="Ubicación" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" name="price_min" placeholder="Precio mínimo" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" name="price_max" placeholder="Precio máximo" class="form-control">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Lista de propiedades -->
        <div class="row">
            @foreach($properties as $property)
                <div class="col-md-4">
                    <div class="property-card">
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="img-fluid">
                        <h3>{{ $property->title }}</h3>
                        <p>{{ $property->price }} USD</p>
                        <a href="{{ route('listings.show', $property->id) }}" class="btn btn-secondary">Ver detalles</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="pagination">
            {{ $properties->links() }}
        </div>
    </div>
</section>

@endsection

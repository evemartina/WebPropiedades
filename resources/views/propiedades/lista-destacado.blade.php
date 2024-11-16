<div class="row">
    @forelse($properties as $property)
        <div class="col-12 col-md-4  mb-3">
            <div class="card" style="width: 100%;">
                <img src="{{ asset($property->imagen_principal) }}" alt="{{$property->nombre}}" class="card-img-top" loading="lazy">
                <div class="amenities mt-2 d-flex justify-content-left align-items-center">
                    @if(isset($property->habitaciones))
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{asset('storage/images/icons/dormitorio.png')}}" class="icono" />
                            <span>{{ $property->habitaciones }}</span>
                        </span>
                    @endif
                    @if(isset($property->banos))
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{asset('storage/images/icons/bano.png')}}" class="icono" />
                            <span>{{ $property->banos }}</span>
                        </span>
                    @endif
                    @if(isset($property->metros_totales))
                        <span class="p-2 d-flex align-items-center">
                            <img src="{{asset('storage/images/icons/area.png')}}" class="icono" />
                            <span>{{ $property->metros_totales }}</span>
                        </span>
                    @endif
                </div>


                <div class="card-body">
                    <h5 class="card-title">{{$property->nombre}}</h5>
                    <p class="card-text">
                        <span>{{$property->operacion}}</span>
                        <i class="bi bi-cash-coin"></i> {{$property->precio}}</p>
                    <a href="{{ route('listings.show', $property->id) }}" class="btn btn-outline-morado">Ver detalles</a>
                </div>
            </div>
        </div>
        @empty
        <p>No se encontraron propiedades.</p>
    @endforelse
</div>



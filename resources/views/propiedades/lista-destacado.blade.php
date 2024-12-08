<div class="card-group row g-3">
    @forelse($properties as $property)
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset($property->imagen_principal) }}" alt="{{ $property->nombre }}" class="card-img-top" loading="lazy">
                <div class="d-flex justify-content-between mt-2">
                    <div class="amenities d-flex">
                        @if (isset($property->habitaciones))
                            <span class="p-2 d-flex align-items-center">
                                <img src="{{ asset('images/icons/dormitorio.png') }}" class="icono" />
                                <span>{{ $property->habitaciones }}</span>
                            </span>
                        @endif
                        @if (isset($property->banos))
                            <span class="p-2 d-flex align-items-center">
                                <img src="{{ asset('images/icons/bano.png') }}" class="icono" />
                                <span>{{ $property->banos }}</span>
                            </span>
                        @endif
                        @if (isset($property->metros_totales))
                            <span class="p-2 d-flex align-items-center">
                                <img src="{{ asset('images/icons/area.png') }}" class="icono" />
                                <span>{{ $property->metros_totales }} m²</span>
                            </span>
                        @endif
                    </div>

                    @if (isset($property->visitas))
                        <div class="d-flex align-items-center p-2">
                            <i class="bi bi-eye"></i>
                            <span class="">{{ $property->visitas }}</span>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $property->nombre }}</h5>
                    <p class="card-text">
                        <i class="bi bi-cash-coin"></i>  {{ number_format( $property->precio,0,'','.') }}
                    </p>

                </div>
                <a href="{{ route('listings.show', $property->id) }}" class="text-light " style="text-decoration: none">
                <div class="card-footer ">
                     Ver detalles
                    </div>
                </a>
            </div>
        </div>
    @empty
        <h4 class="text-center mb-5">No se encontraron propiedades.</h4>
    @endforelse
</div>

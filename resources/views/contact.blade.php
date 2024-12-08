@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<section class="contact-form rounded m-5 p-5 shadow-lg">
    <div class="container-fluid">
        <h2 class="display-3 fw-bold mb-5">Contáctanos</h2>
        <form action="{{ route('enviarCorreo') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group row mb-4">
                <label class="col-md-3 col-form-label fw-bold" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="form-group row mb-4">
                <label class="col-md-3 col-form-label fw-bold" for="email">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Mensaje -->
            <div class="form-group row mb-4">
                <label class="col-md-3 col-form-label fw-bold" for="mensaje">Mensaje</label>
                <div class="col-md-9">
                    <textarea name="mensaje" id="mensaje" rows="4" class="form-control" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Botón de Enviar -->
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </div>
        </form>
    </div>
</section>

@endsection

@push('footer')
    @include('layouts.partials.footer', ['info' => $info])
@endpush

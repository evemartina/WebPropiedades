@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Información General</h1>

        <div class="d-flex justify-content-end m-3">
            <a class="btn btn-primary" href="{{route('general-information.edit',$info->id)}}">Editar</a>
        </div>

        <div class="row mb-3">
            <label for="mision" class="col-sm-2 col-form-label">Misión:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->mision }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="vision" class="col-sm-2 col-form-label">Visión:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->vision }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="horarios" class="col-sm-2 col-form-label">Horarios:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->horarios }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->email }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->telefono }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->whatsapp }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="instagram" class="col-sm-2 col-form-label">Instagram:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->instagram }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="facebook" class="col-sm-2 col-form-label">Facebook:</label>
            <div class="col-sm-10">
                <p class="form-control-plaintext">{{ $info->facebook }}</p>
            </div>
        </div>
    </div>
@endsection

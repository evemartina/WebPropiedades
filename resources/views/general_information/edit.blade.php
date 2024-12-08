@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="display-3 mb-4">Información General</h1>

        <form action="{{route('general-information.update',$info->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="mision" class="col-sm-2 col-form-label">Misión:</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="mision" >{{ old('mision', $info->mision ?? '') }}</textarea>
                    @error('mision')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="vision" class="col-sm-2 col-form-label">Visión:</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="vision" class="form-control" >{{ old('vision', $info->vision ?? '') }}</textarea>
                    @error('vision')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="horarios" class="col-sm-2 col-form-label">Horarios:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="horarios" class="form-control" value="{{ old('mision', $info->horarios ?? '') }}">
                    @error('horarios')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ old('email', $info->email ?? '') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono', $info->telefono ?? '') }}">
                    @error('telefono')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp', $info->whatsapp ?? '') }}">
                    @error('whatsapp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="instagram" class="col-sm-2 col-form-label">Instagram:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram', $info->instagram ?? '') }}">
                    @error('instagram')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="facebook" class="col-sm-2 col-form-label">Facebook:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $info->facebook ?? '') }}">
                    @error('facebook')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="d-flex align-content-center">
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

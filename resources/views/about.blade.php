@extends('layouts.app')

@section('title', 'About')
@section('content')

<div class="container mt-5 mb-5">
    <div class="row mb-5">
        <div class="col-lg-6 col-md-12 mb-5 mt-5">
            <div class="card shadow-lg rounded "style="background-color: #001fa040">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="ms-3 ">
                            <h1 class="card-title text-muted fw-bold text-center">Misión</h1>
                            <h4 class="fw-light lh-base p-3 ">{{ $info->mision }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-5 mt-5">
            <div class="card shadow-lg rounded "style="background-color: #001fa040">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="ms-3 ">
                            <h1 class="card-title text-muted fw-bold text-center">Visión</h1>
                            <h4 class="fw-light lh-base p-3">{{ $info->vision }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('footer')
    @include('layouts.partials.footer', ['info' => $info])
@endpush

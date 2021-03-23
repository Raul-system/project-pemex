@extends('adminlte::page')

@section('title', 'Rechazados')

@section('content_header')
    <h1>Lista de Documentos en Proceso de Validacion</h1>
@stop

@section('content')
    <section class="container my-2">
    </section>
    <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 20px;">
                {{ session('status') }}
            </div>
        @endif
    </section>
    <section class="container-fluid bg-light py-5">
        <section class="row">
            <div class="col-1 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-11 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Observaciones</span></div>
            </div>
        </section>
        @foreach ($rechazados as $item)
        <section class="row py-3">
                <div class="col-1 text-center font-weight-bold" style="font-size: 21px;">
                    {{ $item->id }}
                </div>
                   <div class="col-11 text-justify">
                    {{$item->observaciones}}
                </div>
            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $rechazados->links('vendor.pagination.default') }}
        </section>
    </section>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    })
@stop --}}
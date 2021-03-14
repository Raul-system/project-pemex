@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
     <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        @endif
    </section>
    <section class="container-fluid bg-light py-5">
        <section class="row">
            <div class="col-4 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">Identificador Unico</span>
            </div>
            <div class="col-8 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Contratación</span></div>
            </div>
        </section>
        @foreach ($departamentoPersonal as $item)
        <section class="row py-3">
                <div class="col-4 text-center font-weight-bold" style="font-size: 21px;">
                    {{ $item->id }}
                </div>
                   <div class="col-8">
                    <a href="{{ route('departamento-personal.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                </div>
            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $departamentoPersonal->links('vendor.pagination.default') }}
        </section>
    </section>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@stop
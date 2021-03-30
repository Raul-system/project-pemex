@extends('adminlte::page')

@section('title', 'Desarrollo Humano')

@section('content_header')
    <h1>Desarrollo Humano</h1>
@stop

@section('content')
 <x-search-component modelo="Desarrollo_Humano" route-redirect="desarrollo-humano.show" :campos="array(
                [
                    'text'=>'Plaza',
                    'value'=>'plaza'
                ],
            )"></x-search-component>
    <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        @endif
    </section>
    {{-- --------------------- --}}
    <section class="container-fluid bg-light py-5">
        <section class="row">
            <div class="col-1 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-6 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Plaza</span></div>
            </div>
            <div class="col-5 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
        @foreach ($desarrolloHumano as $item)
        <section class="row py-3">
                <div class="col-1 text-center font-weight-bold" style="font-size: 19px;">
                    {{ $item->id }}
                </div>
                <div class="col-6 d-flex justify-content-center">
                    {{$item->plaza}}
                </div>
                   <div class="col-5">
                    <a href="{{ route('desarrollo-humano.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                </div>
            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $desarrolloHumano->links('vendor.pagination.default') }}
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
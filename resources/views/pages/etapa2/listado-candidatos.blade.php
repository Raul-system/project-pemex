@extends('adminlte::page')

@section('title', 'Fechas')

@section('content_header')
    <h1>Listado de toda la Documentacion Disponible</h1>
@stop

@section('content')
 <x-search-component modelo="Fechas" route-redirect="proceso-fechas.show" :campos="array(
                 [
                    'text'=>'Nombre',
                    'value'=>'nombre'
                ],              
                [
                    'text'=>'Ficha',
                    'value'=>'ficha'
                ],
            )"></x-search-component>
    {{-- --------------------- --}}
    <section class="container-fluid bg-light py-5">
        <section class="row">
            <div class="col-3 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-9 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
        @foreach ($integrantes_proceso as $item)
        <section class="row py-3">
                <div class="col-3 text-center font-weight-bold" style="font-size: 19px;">
                    {{ $item->id }}
                </div>
                   <div class="col-9">
                    <a href="{{ route('proceso-fechas.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Fechas">Consultar Proceso y Fechas...</a>
                </div>
            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $integrantes_proceso->links('vendor.pagination.default') }}
        </section>
    </section>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    })
@stop
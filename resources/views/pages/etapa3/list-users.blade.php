@extends('adminlte::page')

@section('title', 'Fechas')

@section('content_header')
    <h1>Listado de toda la Documentacion Disponible</h1>
@stop

@section('content')
 <x-search-component modelo="Contratados" route-redirect="generar-reporte-excel-candidato" :campos="array(
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
            <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
                  <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Nombre</span></div>
            </div>
                  <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ficha</span></div>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Reporte Excel</span></div>
            </div>
        </section>
        @foreach ($lista_contratados_reporte as $item)
        <section class="row py-3">
                <div class="col-2 text-center font-weight-bold" style="font-size: 19px;">
                    {{ $item->id }}
                </div>
                <div class="col-3 text-center font-weight-bold">
                    {{$item->nombre}}
                </div>
                <div class="col-3 text-center font-weight-bold">
                   {{$item->ficha}}
                </div>
                   <div class="col-4">
                    <a href="{{ route('generar-reporte-excel-candidato', $item->id) }}" class="btn btn-success btn-block" title="Consultar Fechas">Descargar Reporte Excel</a>
                </div>
            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $lista_contratados_reporte->links('vendor.pagination.default') }}
        </section>
    </section>
@stop
@extends('adminlte::page')

@section('title', 'Resultados de Búsqueda')

@section('content_header')
    <h1>Lista de Documentos en Proceso de Validacion</h1>
@stop

@section('content')
    {{-- <section class="container d-flex justify-content-end"> --}}
        {{-- <a class="btn btn-success btn-md my-3" href="{{ backPage() }}">Regresar</a> --}}
    {{-- </section> --}}
    <section class="container-fluid bg-light py-5">
        @if ($nameModel == 'Integracion_Regional')
            <section class="row">
                <div class="col-4 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Identificador Unico</span>
                </div>
                <div class="col-8 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>
            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">
                    <div class="col-4 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->id }}
                    </div>
                    <div class="col-8">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>
                </section>
            @endforeach
        @endif
        {{-- --- --}}
        @if ($nameModel == 'Desarrollo_Humano')
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
            @foreach ($resultados as $item)
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
        @endif
        {{-- --- --}}
        @if ($nameModel == 'Departamento_Personal')
        <section class="row">
            <div class="col-1 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ficha</span></div>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Plaza</span></div>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
            @foreach ($resultados as $item)
                <section class="row py-3">
                    <div class="col-1 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->id }}
                    </div>
                    <div class="col-4">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{$item->ficha}}</span></div>
                    </div>
                    <div class="col-4">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{ $item->nombre }}</span></div>
                    </div>
                    <div class="col-3">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>
                </section>
            @endforeach
        @endif
       @if ($nameModel == 'Contratados')
           <section class="row">
            <div class="col-1 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ficha</span></div>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Plaza</span></div>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
            @foreach ($resultados as $item)
                <section class="row py-3">
                    <div class="col-1 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->id }}
                    </div>
                    <div class="col-4">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{$item->ficha}}</span></div>
                    </div>
                    <div class="col-4">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{ $item->nombre }}</span></div>
                    </div>
                    <div class="col-3">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Descargar Reporte Excel...</a>
                    </div>
                </section>
                @endforeach
       @endif

       @if ($nameModel == 'Fechas')
           <section class="container-fluid bg-light py-5">
        <section class="row">
            <div class="col-3 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-3 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">Nombre</span>
            </div>
            <div class="col-3 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">Ficha</span>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
        @foreach ($resultados as $item)
        <section class="row py-3">
                <div class="col-3 text-center font-weight-bold" style="font-size: 19px;">
                    {{ $item->id }}
                </div>
                <div class="col-3 text-center font-weight-bold" style="font-size: 19px;">
                    {{ isset($item->nombre) ? $item->nombre : 'No hay registros disponibles'  }}
                </div>
                <div class="col-3 text-center font-weight-bold" style="font-size: 19px;">
                    {{ isset($item->ficha) ? $item->ficha : 'No hay registros disponibles'  }}
                </div>
                   <div class="col-3">
                    <a href="{{ route('proceso-fechas.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Fechas">Consultar Proceso y Fechas...</a>
                </div>
            </section>
            @endforeach
           </section>
       @endif
        {{-- <section class="container d-flex justify-content-center">
            {{ $integracion->links('vendor.pagination.default') }}
        </section> --}}
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
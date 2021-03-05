@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center font-weight-bold h1">Subir Documentos</h1>
@stop

@section('content')
    <section class="container-fluid bg-light py-5">
        <p class="font-weight-bold h2 text-center mt-4 mb-2">Proceso de Registro de Documentos del Candidato</p>
        <form action="{{ route('integracion-regional.store') }}" method="POST" enctype="multipart/form-data" class="mt-5 mb-3 py-3">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="memorandum_file" name="memorandum" lang="es" accept=".pdf" multiple>
                      <label class="custom-file-label" for="memorandum_file">Memorandum</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="cedula_siep_file" name="cedula_siep" lang="es" accept=".pdf" multiple>
                      <label class="custom-file-label" for="cedula_siep_file">Cédula SIEP</label>
                    </div>
                </div>
            </div>
            <section class="container py-3 mt-3">
                <input type="submit" class="btn btn-success btn-block d-block mx-auto" value="Registrar y Guardar Documentos">
            </section>
        </form>
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
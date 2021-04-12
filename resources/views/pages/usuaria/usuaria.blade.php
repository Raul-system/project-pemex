@extends('adminlte::page')

@section('title', 'Area Usuaria')

@section('content_header')
    <h1 class="text-center font-weight-bold h1">Subir Documentos</h1>
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
        <p class="font-weight-bold h2 text-center mt-4 mb-2">Registro de memorándum de contratación</p>
        <form action="{{ route('integracion-regional.store') }}" method="POST" enctype="multipart/form-data" class="mt-5 mb-3 py-3">
            @csrf
            
            <div class="row container p-3">

                <div class="col-12">
                    <div class="form-group">
                      <label for="posicion">Posicion</label>
                      <input type="text" class="form-control" id="posicion" name="posicion" placeholder="Escribe la posicion..." onkeyup="enabledInputFiles()" value="{{ old("posicion") }}">
                      {!!  $errors->first('posicion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                      <label for="ficha">Ficha</label>
                      <input type="text" class="form-control" id="ficha" name="ficha" placeholder="Escribe la ficha..." onkeyup="enabledInputFiles()" value="{{ old("ficha") }}">
                      {!!  $errors->first('ficha' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe la nombre..." onkeyup="enabledInputFiles()" value="{{ old("nombre") }}">
                      {!!  $errors->first('nombre' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                      <label for="regimen_contractual">Regimen contractual</label>
                      <input type="text" class="form-control" id="regimen_contractual" name="regimen_contractual" placeholder="Escribe la regimen_contractual..." onkeyup="enabledInputFiles()" value="{{ old("regimen_contractual") }}">
                      {!!  $errors->first('regimen_contractual' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

        <!-- Campos para adjuntar los documentos -->
                <div class="col-12 mt-4">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="memorandum_file" name="memorandum" lang="es" accept=".pdf"  disabled value="{{ old('memorandum') }}">
                      <label class="custom-file-label" for="memorandum_file">Memorandum <small class="text-primary mx-1">Máximo 256 MB</small> </label>
                      {!!  $errors->first('memorandum' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>
                {{-- <div class="col-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="cedula_siep_file" name="cedula_siep" lang="es" accept=".pdf">
                      <label class="custom-file-label" for="cedula_siep_file">Cédula SIEP</label>
                    </div>
                </div> --}}
            </div>
            <div class="container-fluid my-2">
                <p class="text-center font-weight-bold my-2"><i class="fa fa-exclamation-triangle mx-1" aria-hidden="true"></i>Favor de Solo subir 7 archivos como máximo</p>
                <div class="row py-3 px-2">
                    <div class="col-12 custom-file">
                        <input type="file" class="custom-file-input" id="files_especiales" name="files_especials[]" lang="es" accept=".pdf" multiple disabled value="{{ old('files_especials') }}">
                        <label class="custom-file-label" for="files_especiales">Subir Archivos Adicionales <small class="text-primary mx-1">Máximo 768 MB en total</small></label>
                        {!!  $errors->first('files_especials' , '<small class="text-danger font-weight-bold">:message</small>') !!}
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

        function enabledInputFiles(){
        const inputName = $('#nombre').val(), inputPosicion = $('#posicion').val(), inputFicha = $('ficha').val(), inputRegimenContractual = $('#regimen_contractual').val();
                if( inputName != '' && inputPosicion != '' && inputFicha != '' && inputRegimenContractual != '' ){
                    $('#memorandum_file').removeAttr('disabled');
                    $('#files_especiales').removeAttr('disabled');
                }
                if( inputName == '' || inputPosicion == '' || inputFicha == '' || inputRegimenContractual == '' ){
                    $('#memorandum_file').attr('disabled','disabled');
                    $('#files_especiales').attr('disabled','disabled');
                }
        }


    </script>
@stop
@extends('adminlte::page')

@section('title', 'Validacion')

@section('content_header')
    <h1>Departamento de Desarrollo Humano</h1>
@stop

@section('content')
  
<x-bandeja-entrada-documentos :diff-fecha="$userDesarrolloHumano->created_at->diffForHumans()" data-parent-component="downloadFiles">
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_memorandum_download" card-header="headerMemorandum" documento="Memorandum"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => 'memorandum'] ) }}" class="btn btn-success btn-block">Descargar Memorandum</a>
      </x-item-card-document>
      {{-- ------- --}}
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_cedulasiep_download" card-header="headerCedula" documento="Cedula SIEP"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => 'cedula_siep'] ) }}" class="btn btn-success btn-block">Descargar Cedula SIEP</a>
      </x-item-card-document>
      {{-- -------- --}} 
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_files_adicionales" card-header="headerFilesAdicionales" documento="Archivos Adicionales">
         @foreach (json_decode($archivos_adicionales[0]) as $key => $item)
                    @if ($item)
                       <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => $key]) }}" class="btn btn-success py-2 my-3 btn-block">Descargar Archivo Adicional "{{ $key }}"</a> 
                    @endif
            @endforeach
      </x-item-card-document>

</x-bandeja-entrada-documentos>
{{-- Para completar la Validacion --}}

<section class="container py-5 bg-light">
  <p class="text-center font-weight-bold h2 mt-2">Descargar Nvo Talento en formato Word</p>
  <a class="btn btn-success btn-block mx-auto font-weight-bold text-white" href="{{ route('download-word-desarrollo-humano') }}">Descargar Nvo. Talento</a>
</section>

<section class="container my-4" title="Formulario de Registro y Validacion">
  <section class="container col-5 my-2">
    <p class="h2 text-center font-weight-bold">Proceso de Validacion</p>
  </section>
  <section class="row">
    <div class="form-group col-7" title="No Procede">
      <section class="container my-2">
        <p class="text-center font-weight-bold h2">Rechazar Documentos</p>
      </section>
      <x-procedimiento-cancelar departamento="Desarrollo Humano" :data="$userDesarrolloHumano->id_integracion" :controls="$controls"></x-procedimiento-cancelar>
    </div>
    {{-- ---- --}}
    <div class="col-5 mt-4 mb-5" title="Informacion de No Procede">
      <p class="text-justify text-muted mt-5">
        El control de No procede cancelará automaticamente todos los documentos del Candidato y será dado de baja en el sistema de Validación
      </p>
      <img src="https://cdn.icon-icons.com/icons2/957/PNG/128/delete_icon-icons.com_74434.png" alt="Error" class="d-block mx-auto" height="150px" width="65%">
    </div>
  </section>
  <article class="row">
  {{-- -------------------------- --}}
      <form class="container-fluid col-12 bg-light" action="{{ route('departamento-personal.store') }}" method="POST" enctype="multipart/form-data">
      {{-- Inicio del Formulario --}}
      @csrf
      <input type="hidden" name="id_registro_desarrollo_humano" value="{{ $userDesarrolloHumano->id }}">
      <input type="hidden" name="id_validacion_procedimiento" value="{{ $userDesarrolloHumano->id_integracion }}">
      <input type="hidden" id="posicion_cargar_datos" value="{{ $userDesarrolloHumano->posicion }}">
          {{-- ---------------- --}}
            <section class="col-12" title="Procedimiento">
                <p class="text-center font-weight-bold h2 my-2 bg-success">Procedimiento</p>
                <div class="form-group">
                  <label for="campo_ficha">Ficha: </label>
                  <input type="text" class="form-control" id="campo_ficha" name="ficha" placeholder="Ficha ... " value="{{ old('ficha') }}">
                  {!!  $errors->first('ficha' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                <div class="form-group">
                  <label for="campo_profesion">Profesión: </label>
                  <input type="text" class="form-control" id="campo_profesion" name="profesion" placeholder="Profesion ..." value="{{ old('profesion') }}">
                  {!!  $errors->first('profesion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                <div class="form-group">
                  <label for="campo_sit_contractual">Situación Contractual: </label>
                  {{-- <select name="situacion_contractual" id="campo_sit_contractual" class="form-control">
                    <option value="PS">PS</option>
                    <option value="PC">PC</option>
                    <option value="TC">TC</option>
                    <option value="TS">TS</option>
                  </select> --}}
                  <input type="text" id="campo_sit_contractual" name="situacion_contractual" value="{{ old('situacion_contractual') }}" class="form-control" placeholder="Sit. Contractual o RC">
                </div>
                
                {{-- ---------------------- --}}
                        <div class="form-group">
                              <label for="campo_resultados_tecnicos">Resultados Técnicos: </label>
                              <input type="text" class="form-control" id="campo_resultados_tecnicos" name="resultados_tecnicos" placeholder="Resultados Técnicos ..." value="{{ old('resultados_tecnicos') }}">
                              {!!  $errors->first('resultados_tecnicos' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                              <label for="campo_nombre">Nombre: </label>
                              <input type="text" class="form-control" id="campo_nombre" name="nombre" placeholder="Nombre ..." value="{{ old('nombre') }}">
                              {!!  $errors->first('nombre' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="campo_numero_cedula">No. De cédula: </label>
                            <input type="text" class="form-control" id="campo_numero_cedula" name="num_cedula" placeholder="No. De cédula ..." value="{{ old('num_cedula') }}">
                            {!!  $errors->first('num_cedula' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="campo_cpp">CPP: </label>
                            <input type="text" class="form-control" id="campo_cpp" name="cpp" placeholder="CPP ..." value="{{ old('cpp') }}">
                            {!!  $errors->first('cpp' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        
            </section>
          {{-- ----------------------- --}}
            <section class="col-12" title="Subida de Archivos">
                    <p class="font-weight-bold h2 text-center mt-4 mb-2">Subir Documentos del Cobertura</p>
                        <div class="row">
                            <div class="col-6">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="carta_no_inhabilitacion" name="carta_no_inhabilitacion" lang="es" accept=".pdf" value="{{ old('carta_no_inhabilitacion') }}">
                                  <label class="custom-file-label" for="carta_no_inhabilitacion">Carta de no inhabilitación</label>
                                  {!!  $errors->first('carta_no_inhabilitacion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="cedula_siep_file" name="cedula_siep" lang="es" accept=".pdf" value="{{ old('cedula_siep') }}">
                                  <label class="custom-file-label" for="cedula_siep_file">Cédula SIEP Firmado</label>
                                  {!!  $errors->first('cedula_siep' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <section class="container my-2">
                            <article class="row">
                                <div class="col-6">
                                  <div class="custom-file">
                                    {!!  $errors->first('validacion_siep' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                      <input type="file" class="custom-file-input" id="validacion_siep_file" name="validacion_siep" lang="es" accept=".pdf" value="{{old('validacion_siep')}}">
                                      <label class="custom-file-label" for="validacion_siep_file">Validacion SIEP</label>
                                  </div>
                                </div>
                                <div class="col-6 custom-file">
                                  <div class="custom-file">
                                    {!!  $errors->first('resultados_ev_tec' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                      <input type="file" class="custom-file-input" id="resultados_tec" name="resultados_ev_tec" lang="es" accept=".pdf" value="{{old('resultados_ev_tec')}}">
                                      <label class="custom-file-label" for="resultados_tec">Resultados ev. Tec.</label>
                                  </div>
                                </div>
                            </article>
                        </section>
                         <div class="container mt-5">
                           <p class="text-center font-weight-bold">Cláusula 3</p>
                           <p class="text-center font-weight-bold my-2"><i class="fa fa-exclamation-triangle mx-1" aria-hidden="true"></i>Favor de Solo subir 4 archivos como máximo</p>
                            <div class="row px-2">
                                <div class="col-12 custom-file">
                                  {!!  $errors->first('files_especials' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                    <input type="file" class="custom-file-input" id="files_especiales" name="files_especials[]" lang="es" accept=".pdf" multiple>
                                    <label class="custom-file-label" for="files_especiales">Subir Archivos de Clausula 3</label>
                                </div>
                            </div>
                        </div>
 </article>


<section class="card mt-5 bg-secondary border border-dark">
                    <div class="card-header bg-light text-center text-muted">
                            Enviar Documentacion al Departamento Personal
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center h3 font-weight-bold">Bandeja de Salida</p>
                        <button class="btn btn-primary d-block mx-auto" type="button" data-toggle="collapse" data-target="#sectionBandejaSalida" aria-expanded="true" aria-controls="sectionBandejaSalida">
                            <i class="fa fa-angle-double-down" style="font-size: 25px;" aria-hidden="true"></i>
                        </button>
                    </div>
                    {{-- -------------------------------------------------- --}}

                    <section class="container collapse" id="sectionBandejaSalida">
                        {{-- inicio de la  bandeja de salida --}}
                        <article class="row">
                            <div class="col-6">
                                  <div class="custom-file">
                                    {!!  $errors->first('memorandum_documento' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                      <input type="file" class="custom-file-input" id="memorandum_file" name="memorandum_documento" lang="es" accept=".pdf">
                                      <label class="custom-file-label" for="memorandum_file">Memorandum</label>
                                  </div>
                                </div>
                                <div class="col-6 custom-file">
                                  <div class="custom-file">
                                    {!!  $errors->first('cedula_siep_documento' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                      <input type="file" class="custom-file-input" id="cedula_siep_documento" name="cedula_siep_documento" lang="es" accept=".pdf">
                                      <label class="custom-file-label" for="cedula_siep_documento">Cedula SIEP</label>
                                  </div>
                                </div>
                                {{--  --}}
                                <div class="container my-5">
                                    <p class="text-center font-weight-bold">Archivos Adicionales</p>
                                    <p class="text-center font-weight-bold my-2"><i class="fa fa-exclamation-triangle mx-1" aria-hidden="true"></i>Favor de Solo subir 7 archivos como máximo</p>
                                      <div class="row px-2">
                                          <div class="col-12 custom-file">
                                            {!!  $errors->first('archivos_adicionales_documentos' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                              <input type="file" class="custom-file-input" id="archivos_adicionales" name="archivos_adicionales_documentos[]" lang="es" accept=".pdf" multiple>
                                              <label class="custom-file-label" for="archivos_adicionales">Subir Archivos Adicionales</label>
                                          </div>
                                      </div>
                        </div>
                        {{--  --}}
                            </article>
                        </section>
                         
                       
                        {{-- fin de la  bandeja de salida --}}
                    </section>
</section>


                        <div class="container py-2 my-3" title="Envio de los Datos a Desarrollo Humano">
                              <input type="submit" value="Dar procedimiento al Candidato..." class="btn btn-success btn-block d-block mx-auto">
                        </div>
            </section>
          {{-- Fin del Formulario --}}
    </form>
  </article>
</section>


@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
            /* Realizo una peticion Ajax al servidor una vez cargada la página, para generar los valores de forma automática en los campos */
              $.ajax({
            url : '/get-trabajador',
            method: 'POST',
            data: {
              posicion : $('#posicion_cargar_datos').val(),
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){
            JSON.parse(response).forEach(element => {
              $('#campo_ficha').val(element.ficha);
              $('#campo_sit_contractual').val(element.rc);
              $('#campo_nombre').val(element.nombre);
            });
          })
        })
        
    </script>
@stop
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Validacion</h1>
@stop

@section('content')
    <section class="container" title="Descarga de Documentos">
            <div class="card">
              <div class="card-header bg-light text-center text-muted">
                    Descargar Archivos
              </div>
              <div class="card-body">
                <p class="card-text text-center h3 font-weight-bold">Bandeja de Entrada</p>
                <button class="btn btn-primary d-block mx-auto" type="button" data-toggle="collapse" data-target="#SectiondownloadFiles" aria-expanded="true" aria-controls="SectiondownloadFiles">
                    <i class="fa fa-angle-double-down" style="font-size: 25px;" aria-hidden="true"></i>
                </button>
              </div>
              {{-- -------------------------------------------------- --}}

<section class="container collapse" id="SectiondownloadFiles">
    <div class="accordion" id="downloadFiles">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-center font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Memorandum
            </button>
          </h2>
        </div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#downloadFiles">
          <div class="card-body">
           <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => 'memorandum'] ) }}" class="btn btn-success btn-block">Descargar Memorandum</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-center font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Cédula SIEP
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#downloadFiles">
          <div class="card-body">
            <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => 'cedula_siep'] ) }}" class="btn btn-success btn-block">Descargar Cedula</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-center font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Archivos Adicionales
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#downloadFiles">
          <div class="card-body">
            {{-- @if (is_null($archivos_adicionales))
                
            @endif --}}
            @foreach (json_decode($archivos_adicionales[0]) as $key => $item)
                    @if ($item)
                       <a href="{{ route('download',['id' =>$userDesarrolloHumano->id , 'departamento' => 'desarrollo_humano', 'file' => $key]) }}" class="btn btn-success py-2 my-3 btn-block">Descargar Archivo Adicional "{{ $key }}"</a> 
                    @endif
            @endforeach
            {{-- {{$archivos_adicionales[0]}} --}}
          </div>
        </div>
      </div>
    </div>
</section>

              {{-- -------------------------------------------------- --}}
              <div class="card-footer text-muted text-center">
                {{ $userDesarrolloHumano->created_at->diffForHumans() }}
              </div>
            </div>
    </section>
{{-- Para completar la Validacion --}}


<section class="container my-4" title="Formulario de Registro y Validacion">
  <section class="container col-5 my-2">
    <p class="h2 text-center font-weight-bold">Proceso de Validacion</p>
  </section>
  <section class="row">
    <div class="form-group col-7" title="No Procede">
      <section class="container my-2">
        <p class="text-center font-weight-bold h2">Rechazar Documentos</p>
      </section>
      <x-procedimiento-cancelar departamento="Desarrollo Humano" :data="$userDesarrolloHumano->id" :controls="$controls"></x-procedimiento-cancelar>
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
      <input type="hidden" name="id_validacion_procedimiento" value="{{ $userDesarrolloHumano->id }}">
          {{-- ---------------- --}}
            <section class="col-12" title="Procedimiento">
                <p class="text-center font-weight-bold h2 my-2 bg-success">Procedimiento</p>
                <div class="form-group">
                  <label for="campo_posicion">Posicion: </label>
                  <input type="text" class="form-control" id="campo_posicion" name="posicion" placeholder="Posicion ... " value="{{ old('posicion') }}">
                  {!!  $errors->first('posicion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                <div class="form-group">
                  <label for="campo_subdireccion">Subdireccion: </label>
                  <input type="text" class="form-control" id="campo_subdireccion" name="subdireccion" placeholder="Subdireccion ..." value="{{ old('subdireccion') }}">
                  {!!  $errors->first('subdireccion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                <div class="form-group">
                  <label for="campo_grupo">Grupo: </label>
                  <input type="text" class="form-control" id="campo_grupo" name="grupo" placeholder="Grupo ..." value="{{ old('grupo') }}">
                  {!!  $errors->first('grupo' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                
                {{-- ---------------------- --}}
                        <div class="form-group">
                              <label for="campo_motivo_vacante">Motivo de la Vacante: </label>
                              <input type="text" class="form-control" id="campo_motivo_vacante" name="motivo_vacante" placeholder="Moivo de Vacante ..." value="{{ old('motivo_vacante') }}">
                              {!!  $errors->first('motivo_vacante' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                              <label for="campo_vigencia">Vigencia: </label>
                              <input type="text" class="form-control" id="campo_vigencia" name="vigencia" placeholder="Vigencia ..." value="{{ old('vigencia') }}">
                              {!!  $errors->first('vigencia' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="campo_plaza">Plaza: </label>
                            <input type="text" class="form-control" id="campo_plaza" name="plaza" placeholder="plaza ..." value="{{ old('plaza') }}">
                            {!!  $errors->first('plaza' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label for="campo_gerencia">Gerencia: </label>
                            <input type="text" class="form-control" id="campo_gerencia" name="gerencia" placeholder="gerencia ..." value="{{ old('gerencia') }}">
                            {!!  $errors->first('gerencia' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                        </div>
                        
            </section>
          {{-- ----------------------- --}}
            <section class="col-12" title="Subida de Archivos">
                    <p class="font-weight-bold h2 text-center mt-4 mb-2">Subir Documentos del Candidato</p>
                        <div class="row">
                            <div class="col-6">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="memorandum_file" name="memorandum" lang="es" accept=".pdf" value="{{ old('memorandum') }}">
                                  <label class="custom-file-label" for="memorandum_file">Memorandum Firmado</label>
                                  {!!  $errors->first('memorandum' , '<small class="text-danger font-weight-bold">:message</small>') !!}
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
                        <div class="container my-2">
                            <div class="row p-4">
                                <div class="col-12 custom-file">
                                  {!!  $errors->first('files_especials' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                    <input type="file" class="custom-file-input" id="files_especiales" name="files_especials[]" lang="es" accept=".pdf" multiple>
                                    <label class="custom-file-label" for="files_especiales">Subir Archivos Adicionales Especiales</label>
                                </div>
                            </div>
                        </div>
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
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@stop
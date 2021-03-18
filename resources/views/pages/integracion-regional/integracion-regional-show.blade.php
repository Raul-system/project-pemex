@extends('adminlte::page')

@section('title', 'Validacion')

@section('content_header')
    <p class="h1 text-center font-weight-bold bg-warning">Departamento integracion Regional</p>
@stop

@section('content')

<x-bandeja-entrada-documentos :diff-fecha="$userIntegracion->created_at->diffForHumans()" data-parent-component="downloadFiles">
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_memorandum_download" card-header="headerMemorandum" documento="Memorandum"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userIntegracion->id , 'departamento' => 'integracion_regional', 'file' => 'memorandum'] ) }}" class="btn btn-success btn-block">Descargar Memorandum</a>
      </x-item-card-document>

       <x-item-card-document parent-component="downloadFiles" name-collapse="section_files_adicionales" card-header="headerFilesAdicionales" documento="Archivos Adicionales">
         @foreach (json_decode($archivos_adicionales[0]) as $key => $item)
                    @if ($item)
                       <a href="{{ route('download',['id' =>$userIntegracion->id , 'departamento' => 'integracion_regional', 'file' => $key]) }}" class="btn btn-success py-2 my-3 btn-block">Descargar Archivo Adicional "{{ $key }}"</a> 
                    @endif
            @endforeach
      </x-item-card-document>

</x-bandeja-entrada-documentos>


<section class="container my-4" title="Formulario de Registro y Validacion">
  <section class="container col-5 my-2">
    <p class="h2 text-center font-weight-bold">Proceso de Validacion</p>
  </section>
  <section class="row">
    <div class="form-group col-7" title="No Procede">
      <section class="container my-2">
        <p class="text-center font-weight-bold h2">Rechazar Documentos</p>
      </section>
      <x-procedimiento-cancelar departamento="Integracion Regional" :data="$userIntegracion->id" :controls="$controls"></x-procedimiento-cancelar>
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
      <form class="container-fluid col-12 bg-light" action="{{ route('desarrollo-humano.store') }}" method="POST" enctype="multipart/form-data" id="form-integacion-regional">
      {{-- Inicio del Formulario --}}
      @csrf
      <input type="hidden" name="id_validacion_procedimiento" value="{{ $userIntegracion->id }}">
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
                  <select name="subdireccion" id="campo_subdireccion" class="form-control">
                    <option value="SUBDIRECCIÓN DE PROCESO DE GAS Y PETROQUÍMICOS">SUBDIRECCIÓN DE PROCESO DE GAS Y PETROQUÍMICOS</option>
                    <option value="SUBDIRECCIÓN DE SERVICIOS DE SALUD">SUBDIRECCIÓN DE SERVICIOS DE SALUD</option>
                    <option value="AUDITORÍA INTERNA">AUDITORÍA INTERNA</option>
                    <option value="SUBDIRECCIÓN DE CAPITAL HUMANO">SUBDIRECCIÓN DE CAPITAL HUMANO</option>
                    <option value="SUBDIRECCIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN">SUBDIRECCIÓN DE TECNOLOGÍAS DE LA INFORMACIÓN</option>
                    <option value="SUBDIRECCIÓN DE TRANSPORTE">SUBDIRECCIÓN DE TRANSPORTE</option>
                    <option value="AUDITORÍA INTERNA">AUDITORÍA INTERNA</option>
                    <option value="SUBDIRECCIÓN DE COORDINACIÓN FINANCIERA">SUBDIRECCIÓN DE COORDINACIÓN FINANCIERA</option>
                    <option value="SUBDIRECCIÓN DE SERVICIOS CORPORATIVOS">SUBDIRECCIÓN DE SERVICIOS CORPORATIVOS</option>
                    <option value="SUBDIRECCIÓN DE ADMINISTRACIÓN DE SERVICIOS PARA EXPLORACIÓN Y PRODUCCIÓN">SUBDIRECCIÓN DE ADMINISTRACIÓN DE SERVICIOS PARA EXPLORACIÓN Y PRODUCCIÓN</option>
                    <option value="SUBDIRECCIÓN DE SERVICIOS A LA EXPLOTACIÓN">SUBDIRECCIÓN DE SERVICIOS A LA EXPLOTACIÓN</option>
                    <option value="SUBDIRECCIÓN DE PERFORACIÓN Y MANTENIMIENTO DE POZOS">SUBDIRECCIÓN DE PERFORACIÓN Y MANTENIMIENTO DE POZOS</option>
                    <option value="SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN SUR">SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN SUR</option>
                    <option value="SUBDIRECCIÓN DE EXPLORACIÓN">SUBDIRECCIÓN DE EXPLORACIÓN</option>
                    <option value="SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA NORESTE">SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA NORESTE</option>
                    <option value="SUBDIRECCIÓN DE SERVICIOS A LA EXPLOTACIÓN">SUBDIRECCIÓN DE SERVICIOS A LA EXPLOTACIÓN</option>
                    <option value="SUBDIRECCIÓN DE PROYECTOS DE EXPLOTACIÓN ESTRATÉGICOS">SUBDIRECCIÓN DE PROYECTOS DE EXPLOTACIÓN ESTRATÉGICOS</option>
                    <option value="SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA SUROESTE">SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA SUROESTE</option>
                    <option value="SUBDIRECCIÓN DE SEGURIDAD, SALUD EN EL TRABAJO Y PROTECCIÓN AMBIENTAL">SUBDIRECCIÓN DE SEGURIDAD, SALUD EN EL TRABAJO Y PROTECCIÓN AMBIENTAL</option>
                    <option value="SUBDIRECCIÓN TÉCNICA DE EXPLORACIÓN Y PRODUCCIÓN">SUBDIRECCIÓN TÉCNICA DE EXPLORACIÓN Y PRODUCCIÓN</option>
                    <option value="SUBDIRECCIÓN DE TRATAMIENTO Y LOGÍSTICA PRIMARIA">SUBDIRECCIÓN DE TRATAMIENTO Y LOGÍSTICA PRIMARIA</option>
                    <option value="SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA NORESTE">SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN MARINA NORESTE</option>
                    <option value="SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN SUR">SUBDIRECCIÓN DE PRODUCCIÓN REGIÓN SUR</option>
                    <option value="SUBDIRECCIÓN DE SERVICIOS CORPORATIVOS">SUBDIRECCIÓN DE SERVICIOS CORPORATIVOS</option>
                    <option value="DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS">DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS</option>
                  </select>
                  {{-- <input type="text" class="form-control" id="campo_subdireccion" name="subdireccion" placeholder="Subdireccion ..." value="{{ old('subdireccion') }}">
                  {!!  $errors->first('subdireccion' , '<small class="text-danger font-weight-bold">:message</small>') !!} --}}
                </div>
                <div class="form-group">
                  <label for="campo_grupo">Grupo: </label>
                  {{-- <select name="grupo" id="campo_grupo" class="form-control">
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select> --}}
                  <input type="text" class="form-control" id="campo_grupo" name="grupo" placeholder="Grupo ..." value="{{ old('grupo') }}">
                  {!!  $errors->first('grupo' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                </div>
                
                {{-- ---------------------- --}}
                        <div class="form-group">
                              <label for="campo_motivo_vacante">Motivo de la Vacante: </label>
                              <select name="motivo_vacante" id="campo_motivo_vacante" class="form-control">
                                <option value="prorroga">prorroga</option>
                                <option value="vacaciones">vacaciones</option>
                                <option value="promocion temporal">promocion temporal</option>
                                <option value="ascenso temporal">ascenso temporal</option>
                                <option value="comision administrativas">comision administrativas</option>
                                <option value="incapacidad medica">incapacidad medica</option>
                                <option value="CL/43 ">CL/43 </option>
                                <option value="maternidad">maternidad</option>
                                <option value="permisos economicos">permisos economicos</option>
                                <option value="permisos renciables">permisos renciables</option>
                                <option value="obra determinada">obra determinada</option>
                              </select>
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
                    <p class="font-weight-bold h2 text-center mt-4 mb-2">Subir Documentos de Cobertura</p>
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
                          <p class="text-center font-weight-bold my-2"><i class="fa fa-exclamation-triangle mx-1" aria-hidden="true"></i>Favor de Solo subir 7 archivos como máximo</p>
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
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        })
        $('#campo_posicion').on('keyup', function(){
          $.ajax({
            url : '/get-trabajador',
            method: 'POST',
            data: {
              posicion : $('#campo_posicion').val(),
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){
            JSON.parse(response).forEach(element => {
              $('#campo_grupo').val(element.grupo);
              $('#campo_plaza').val(element.plaza);
              $('#campo_gerencia').val(element.gerencia);
            });
          })
        });
  </script>

@stop

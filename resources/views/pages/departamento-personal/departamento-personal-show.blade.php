@extends('adminlte::page')

@section('title', 'Validacion y Contratacion')

@section('content_header')
    <h1>Departamento Personal</h1>
@stop

@section('content')
    <x-bandeja-entrada-documentos :diff-fecha="$userDepartamentoPersonal->created_at->diffForHumans()" data-parent-component="downloadFiles">
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_carta_no_inhabilitacion_download" card-header="headerCartaNoInhabilitacion" documento="Carta de No Inhabilitacion"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'carta_no_inhabilitacion'] ) }}" class="btn btn-success btn-block">Descargar Carta de No Inhabilitacion</a>
      </x-item-card-document>
      {{-- ------- --}}
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_cedulasiep_download" card-header="headerCedulaSIEP" documento="Cedula SIEP"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'cedula_siep'] ) }}" class="btn btn-success btn-block">Descargar Cedula SIEP</a>
      </x-item-card-document>
      {{-- -------- --}} 
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_validacionsiep_download" card-header="headerValidacionSIEP" documento="Validacion SIEP"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'validacion_siep'] ) }}" class="btn btn-success btn-block">Descargar Validacion SIEP</a>
      </x-item-card-document>
      {{-- -------- --}} 
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_resultados_ev_tec_download" card-header="headerResultados_ev_tec" documento="Resultados Ev Tec"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'resultados_ev_tec'] ) }}" class="btn btn-success btn-block">Descargar Resultados Ev Tec</a>
      </x-item-card-document>
      {{-- -------- --}} 
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_files_adicionales" card-header="headerFilesAdicionales" documento="Archivos Adicionales">
         @foreach (json_decode($archivos_adicionales[0]) as $key => $item)
                    @if ($item)
                       <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => $key]) }}" class="btn btn-success py-2 my-3 btn-block">Descargar Archivo Adicional "{{ $key }}"</a> 
                    @endif
            @endforeach
      </x-item-card-document>

</x-bandeja-entrada-documentos>
<section class="container">
  <article class="row">
    <div class="col-6 text-center font-weight-bold bg-dark text-white py-2">
      Nombre
    </div>
    <div class="col-6 text-center font-weight-bold bg-dark text-white py-2">
      Ficha
    </div>
  </article>
  <article class="row">
    <div class="col-6 text-center font-weight-bold py-2">
      {{$userDepartamentoPersonal->nombre}}
    </div>
    <div class="col-6 text-center font-weight-bold py-2">
      {{$userDepartamentoPersonal->ficha}}
    </div>
  </article>
</section>
<div class="container">
  <form action="{{ route('contratados.store') }}" method="POST">
    @csrf
    <div class="container form-group my-4">
      <input type="hidden" name="id_integracion" value="{{$userDepartamentoPersonal->id_integracion}}">
      <button type="submit" class="btn btn-success btn-block">Realizar Contratacion</button>
    </div>
  </form>
</div>
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
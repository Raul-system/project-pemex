@extends('adminlte::page')

@section('title', 'Ver Fechas')

@section('content_header')
    <h1>Proceso de Documentos - Fechas </h1>
@stop
@section('content')
    <section class="container border border-dark">
        <section class="container bg-light">
            <article>
                <p class="h2 text-center">Informacion:</p>
                <p class="text-center"><strong>Posicion:</strong> {{ isset($proceso_desarrolloHumano[0]->posicion) ? $proceso_desarrolloHumano[0]->posicion : 'No hay registro disponible' }}</p>
                <p class="text-center"><strong>Plaza:</strong> {{ isset($proceso_desarrolloHumano[0]->plaza) ? $proceso_desarrolloHumano[0]->plaza : 'No hay registro disponible' }}</p>
                <p class="text-center"><strong>Ficha:</strong> {{ isset($proceso_departamentoPersonal[0]->ficha) ? $proceso_departamentoPersonal[0]->ficha : 'No hay registro disponible' }}</p>
                <p class="text-center"><strong>Nombre:</strong> {{ isset($proceso_departamentoPersonal[0]->nombre) ? $proceso_departamentoPersonal[0]->nombre : 'No hay registro disponible' }}</p>
            </article>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida de Area Usuaria:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_integracionRegional->created_at) ? $proceso_integracionRegional->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento de Integracion Regional:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_integracionRegional->created_at) ? $proceso_integracionRegional->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>
                
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida en el Departamento de Integracion Regional:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_desarrolloHumano[0]->created_at) ? $proceso_desarrolloHumano[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento de Desarrollo Humano:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_desarrolloHumano[0]->created_at) ? $proceso_desarrolloHumano[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

             <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida en el Departamento de Desarrollo Humano:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->created_at) ? $proceso_departamentoPersonal[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento Personal:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->created_at) ? $proceso_departamentoPersonal[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

             <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Contratación:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->updated_at) ? $proceso_departamentoPersonal[0]->updated_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

        </section>
    </section>
@stop


{{-- @section('js')
@stop --}}
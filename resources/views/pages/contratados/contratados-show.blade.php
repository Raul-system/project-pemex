@extends('adminlte::page')

@section('title', 'Ver Informacion Contratado')

@section('content_header')
    <h1>Informacion Sobre Contratados</h1>
@stop

@section('content')
<x-informacion-contratado :controls="array(
    [
        'text' => 'ID',
        'value'=>$contratado->id
    ],
     [
        'text' => 'Posicion',
        'value'=>$contratado->posicion
    ],
     [
        'text' => 'Subdirección',
        'value'=>$contratado->subdireccion
    ],
    [
        'text' => 'Grupo',
        'value'=>$contratado->grupo
    ],
    [
        'text' => 'Motivo de Vacante',
        'value'=>$contratado->motivo_vacante
    ],
     [
        'text' => 'Vigencia',
        'value'=>$contratado->vigencia
    ],
     [
        'text' => 'Plaza',
        'value'=>$contratado->plaza
    ],
     [
        'text' => 'Gerencia',
        'value'=>$contratado->gerencia
    ],
     [
        'text' => 'Ficha',
        'value'=>$contratado->ficha
    ],
    [
        'text' => 'Profesión',
        'value'=>$contratado->profesion
    ],
    [
        'text' => 'Situacion Contractual',
        'value'=>$contratado->situacion_Contractual
    ],
    [
        'text' => 'Resultados Técnicos',
        'value'=>$contratado->resultados_tecnicos
    ],
    [
        'text' => 'Nombre',
        'value'=>$contratado->nombre
    ],
     [
        'text' => 'Numero de Cédula',
        'value'=>$contratado->num_Cedula
    ],
      [
        'text' => 'CPP',
        'value'=>$contratado->cpp
    ],
)"></x-informacion-contratado>
@stop

@section('js')
@stop
@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-info mb-4 ml-2"id="btnAEs"><i class="fas fa-plus-square" ></i> &nbsp Añadir Espacio</button>
<table id="tablaEspacios" class="table table-hover table-primary w-100">
    <thead>
        <th></th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Aforo</th>
        <th>Localizacion</th>
     
        

    </thead>
    <tbody></tbody>
</table>

    
@include('formularioEspacio')
@include('vistaDetEspacios')
@include('formularioAHorarios')

@endsection
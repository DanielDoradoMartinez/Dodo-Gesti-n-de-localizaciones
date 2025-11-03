@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-info mb-4 ml-2"id="btnALoc"><i class="fas fa-plus-square" ></i> &nbsp Añadir Localización</button>
<table id="tablaLocalizaciones" class="table table-hover table-info w-100">
    <thead>
        <th></th>
        <th>Nombre</th>
        <th>Direccion</th>
   
        

    </thead>
    <tbody></tbody>
</table>

@include('formularioLocalizacion')

@endsection
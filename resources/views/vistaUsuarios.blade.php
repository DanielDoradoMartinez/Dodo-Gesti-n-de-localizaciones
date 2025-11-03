@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-info mb-4 ml-2"id="btnGClave"><i class="fas fa-plus-square" ></i> &nbsp Generar Clave</button>
<table id="tablaUsuarios" class="table table-hover table-info w-100">
    <thead>
        <th></th>
        <th>Usuario</th>
        <th>Nombre y Apellidos</th>
        <th>Email</th>
      
        

    </thead>
    <tbody></tbody>
</table>



@endsection
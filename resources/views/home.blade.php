@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (  auth()->user()->admin ==1)
                
          
            <div class="card">
                <div class="card-header"><h1><center>{{ __('Menu Principal') }}</h1></center></div>

                <div class="card-body">
                    <h2>  <a href="{{ route('reservas') }}" class="badge badge-primary col align-self-center">Reservas</a></h2>                  
                    <h2>  <a href="{{ route('localizaciones') }}" class="badge badge-primary col align-self-center">Localizaciones</a></h2>
                    <h2>  <a href="{{ route('espacios') }}" class="badge badge-primary col align-self-center">Espacios</a></h2>
                    <h2>  <a href="{{ route('usuarios') }}" class="badge badge-primary col align-self-center">Usuarios</a></h2>
               
                </div>
            </div>
            @endif
            @if (  auth()->user()->admin ==0)
            <center>
            <h1><i class="fas fa-sad-tear"></i>Acceso denegado<i class="fas fa-sad-tear"></i></h1>
         <img src="/pocoyo.png" class="img-fluid" alt="Responsive image"> </center>
            @endif
        </div>
    </div>
</div>
@endsection

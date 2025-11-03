@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2><center><i class="fas fa-key"></i>{{ __('Acceso') }}</center></h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="usuario" class="col-sm-4 col-form-label text-md-right"><h3><i class="fas fa-user mr-2"></i>{{ __('Usuario') }}</h3></label>
                        
                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>
                        
                                @if ($errors->has('usuario'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><h3><i class="fas fa-lock mr-2"></i>{{ __('Contraseña') }}</h3></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <center>
                           
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <h4>  <i class="fas fa-sign-in-alt"></i> {{ __('Entrar') }} </h4>
                                </button>

                               
                            </div>
                        </div>
                    </center>
               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
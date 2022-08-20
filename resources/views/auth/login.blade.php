@extends('layouts.auth_app')
@section('title')
Iniciar Sesión
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h4>Iniciar Sesión</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger p-0">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif
            <div class="form-group">
             
                <label for="email">Correo</label>
                <input aria-describedby="emailHelpBlock" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Ingrese su correo electronico" tabindex="1" value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus required>
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Contraseña</label>
                    <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                            Olvido su contraseña?
                        </a>
                    </div>
                </div>
                <input aria-describedby="passwordHelpBlock" id="password" type="password" value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}" placeholder="Ingrese una contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Recuerdame</label>
                </div>


            </div>

            <div class="form-group ">
                <div class="row justify-content-center">
                    {!! NoCaptcha::renderJs('es', false, 'onLoadCallback') !!}
                    {!! NoCaptcha::display() !!}
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
    Aun no tienes cuenta? <a href="{{ route('register') }}">Crear cuenta</a>
</div>
@endsection
@extends('layouts.panel')

@section('content')
    <div class="jumbotron bg-info bg-gradient shadow-lg" style="padding-top: 80px; padding-bottom: 80px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1 class="display-4">¡Bienvenido!</h1>
                    <p class="lead font-weight-normal">
                        Para poder tener acceso a todas las funciones de esta aplicación WEB, primero deberás registrarte o si ya tienes una cuenta, solo inicia sesión.
                    </p>

                    <hr class="my-4" />
                        @if(auth()->user())
                            <a href="{{ url('/profile') }}" class="btn btn-secondary btn-lg">Mi Perfil</a>
                        @else
                            <div class="btn-group" role="group">
                                <a href="#register" data-toggle="modal" data-target="#register" class="btn btn-primary btn-lg">Registrarme</a>
                                <a href="#login" data-toggle="modal" data-target="#login" class="btn btn-secondary btn-lg">Iniciar Sesión</a>
                            </div>
                        @endif
                    </hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(auth()->user() && auth()->user()->hasRole('user'))
            <store-component login="{{ auth()->user() }}" user="{{ auth()->user()->person }}"/>
        @else
            <store-component login="{{ auth()->user() }}" />
        @endif
    </div>
@endsection
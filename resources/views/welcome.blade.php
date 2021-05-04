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
                            <a href="#" class="btn btn-secondary btn-lg">Mi Perfil</a>
                        @else
                            <div class="btn-group" role="group">
                                <a href="#login" data-toggle="modal" data-target="#login" class="btn btn-primary btn-lg">Registrarme</a>
                                <a href="#register" data-toggle="modal" data-target="#register" class="btn btn-secondary btn-lg">Iniciar Sesión</a>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{ asset('https://officemax.vteximg.com.br/arquivos/ids/194937-720-720/107475_1.jpg?v=637243309809730000') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{ asset('https://officemax.vteximg.com.br/arquivos/ids/194937-720-720/107475_1.jpg?v=637243309809730000') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{ asset('https://officemax.vteximg.com.br/arquivos/ids/194937-720-720/107475_1.jpg?v=637243309809730000') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{ asset('https://officemax.vteximg.com.br/arquivos/ids/194937-720-720/107475_1.jpg?v=637243309809730000') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <example-component/>
@endsection
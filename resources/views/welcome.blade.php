@extends('layouts.layout')

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

                        <!-- Si ya ha iniciado sesión se muestra esto -->
                        <!-- <a href="#" class="btn btn-info btn-lg">Mi Perfil</a> -->

                    
                        <!-- Si no ha iniciado sesión, se muestra esto -->
                        <div class="btn-group" role="group">
                            <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Registrarme</a>
                            <a href="{{ url('/login') }}" class="btn btn-secondary btn-lg">Iniciar Sesión</a>
                        </div>

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
    <example-component />
@endsection
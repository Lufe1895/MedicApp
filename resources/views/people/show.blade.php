@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Mi Perfil</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('DefaultImage/Default.png') }}" class="card-img" alt="user">
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">{{ $person->name }}</h5>
                                        <p class="card-text">
                                            {{ $person->last_name }}
                                        </p>
                                        <p class="card-text text-muted">
                                            <span class="font-weight-bold">Correo: </span>
                                            {{ $person->user->email }}
                                        </p>
                                        <p class="card-text text-muted">
                                            <span class="font-weight-bold">Teléfono: </span>
                                            {{ $person->phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Dirección:</td>
                                <td class="">{{ $person->address }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Sexo:</td>
                                <td>{{ $person->sex }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Edad:</td>
                                <td>{{ $person->age }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; <span class="d-none d-sm-inline">Volver a la Tienda</span></a>
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ url('/people') }}" class="btn btn-info"><i class="fas fa-chevron-left"></i> &nbsp; <span class="d-none d-sm-inline">Volver a la Lista</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
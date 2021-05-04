@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Detalles del Usuario</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Id de Usuario:</td>
                                <td>{{ $user->id }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Nombre:</td>
                                <td>{{ $user->name }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Apellido:</td>
                                <td>{{ $user->last_name }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Correo:</td>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Telefono:</td>
                                <td>{{ $user->phone }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Direccion:</td>
                                <td>{{ $user->address }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Edad:</td>
                                <td>{{ $user->age }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/users') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; Volver a la Lista</a>
                    <a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

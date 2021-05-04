@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Usuarios</h1>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <div class="card-body">
                    <p class="text-right"><a href="#createUser" data-toggle="modal" data-target="#createUser" class="button special"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Agregar un nuevo Usuario</a></p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles()->first()->description }}</td>
                                    <td>
                                        <a href="#"><i class="fas fa-eye text-primary"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="/users/edit/{{$user->id}}"><i class="fas fa-edit text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="#"><i class="fas fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <h5>No hay usuarios</h5>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUser" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <createuser-component />
            </div>
        </div>
    </div>
@endsection

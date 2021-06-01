@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Personas</h1>
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
                            @forelse($people as $person)
                                <tr>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->phone }}</td>
                                    <td>{{ $person->user->email }}</td>
                                    <td>{{ $person->user->roles->first()->description }}</td>
                                    <td>
                                        <a href="{{ url('/people/'.$person->id)}}"><i class="fas fa-eye text-primary"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/people/'.$person->id.'/edit') }}"><i class="fas fa-edit text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
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
    </div>
@endsection
@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Pedidos</h1>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <div class="card-body">
                    <p class="text-right"><a href="{{ url('/pedidos/create') }}" class="button special"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Agregar un nuevo Pedido</a></p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Farmacia</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($pharmacies as $pharmacy)
                                <tr>
                                    <td>{{ $pharmacy->name }}</td>
                                    <td>{{ $pharmacy->phone }}</td>
                                    <td>{{ $pharmacy->user->email }}</td>
                                    <td>
                                        <a href="{{ url('/pharmacies/'.$pharmacy->id) }}"><i class="fas fa-eye text-primary"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/pharmacies/'.$pharmacy->id.'/edit') }}"><i class="fas fa-edit text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;                                        
                                    </td>
                                </tr>
                            @empty
                                <h5>No hay pedidos</h5>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
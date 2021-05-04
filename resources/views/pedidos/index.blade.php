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
                                <th>Id de Usuario</th>
                                <th>Id de Farmacia</th>
                                <th>Método de Pago</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->user_id }}</td>
                                    <td>{{ $pedido->pharmacy_id }}</td>
                                    <td>{{ $pedido->payment }}</td>
                                    <td>${{ $pedido->total }}</td>
                                    <td>
                                        <a href="{{ url('/pedidos/'.$pedido->id) }}"><i class="fas fa-eye text-primary"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="{{ url('/pedidos/'.$pedido->id.'/edit') }}"><i class="fas fa-edit text-success"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <form action="{{ url('/pedidos/'.$pedido->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"><i class="fas fa-trash text-danger"></i></button>
                                        </form>
                                        
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
                <login-component />
            </div>
        </div>
    </div>
@endsection
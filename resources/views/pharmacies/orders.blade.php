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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha de pedido</th>
                                <th>Estado</th>
                                <th>Método de Pago</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $order->state->name }}</td>
                                    <td>{{ $order->payment }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td>
                                        <a href="{{ url('/pedidos/'.$order->id) }}">Ver detalles</a>
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

        <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUser" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <login-component />
            </div>
        </div>
    </div>
@endsection
@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Detalles de Pedido</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="font-weight-bold">Id de Usuario:</td>
                                <td>{{ $pedido->user_id }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Id de Farmacia:</td>
                                <td>{{ $pedido->pharmacy_id }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Dirección:</td>
                                <td>{{ $pedido->address }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Número de Teléfono:</td>
                                <td>{{ $pedido->phone }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Receta:</td>
                                <td><a href="#">Ver</a></td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Método de Pagos:</td>
                                <td>{{ $pedido->payment }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Id de estado:</td>
                                <td>{{ $pedido->state_id }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Total:</td>
                                <td>${{ $pedido->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/pedidos') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; Volver a la Lista</a>
                    <a href="{{ url('/pedidos/'.$pedido->id.'/edit') }}" class="btn btn-secondary"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                                <td class="font-weight-bold">Usuario:</td>
                                <td>
                                    <span class="text-bold">Nombre: </span>{{ $pedido->person->name }} <br>
                                    <span class="text-bold">Apellidos: </span>{{ $pedido->person->last_name }} <br>
                                    <span class="text-bold">Teléfono: </span>{{ $pedido->person->phone }} <br>
                                    <span class="text-bold">correo: </span>{{ $pedido->person->user->email }} <br>
                                </td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Farmacia:</td>
                                <td>
                                    <span class="text-bold">Nombre: </span>{{ $pedido->pharmacy->name }} <br>
                                    <span class="text-bold">Correo: </span>{{ $pedido->pharmacy->user->email }} <br>
                                    <span class="text-bold">Teléfono: </span>{{ $pedido->pharmacy->phone }} <br>
                                </td>
                            </tr>

                            @if($pedido->meds)
                                <tr>
                                    <td class="font-weight-bold">Medicamentos:</td>
                                    <td>{{ $pedido->meds }}</td>
                                </tr>
                            @endif

                            <tr>
                                <td class="font-weight-bold">Dirección:</td>
                                <td>{{ $pedido->address }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Número de Teléfono:</td>
                                <td>{{ $pedido->phone }}</td>
                            </tr>

                            @if($pedido->prescription)
                                <tr>
                                    <td class="font-weight-bold">Receta:</td>
                                    <td><a href="#prescription" data-toggle="modal" data-target="#prescription">Ver Receta</a></td>
                                </tr>
                            @endif

                            <tr>
                                <td class="font-weight-bold">Método de Pagos:</td>
                                <td>{{ $pedido->payment }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Estado:</td>
                                <td>{{ $pedido->state->name }}</td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Total:</td>
                                <td>${{ $pedido->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="btn-group">
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ url('/pedidos') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; Volver a la Lista</a>
                        <a href="{{ url('/pedidos/'.$pedido->id.'/deliver') }}" class="btn btn-success"><i class="fas fa-hand-holding"></i> &nbsp; Marcar como Entregado</a>
                        <a href="{{ url('/pedidos/'.$pedido->id.'/cancel') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> &nbsp; Cancelar Pedido</a>
                        <a href="#total" data-toggle="modal" data-target="#total" class="btn btn-info"><i class="fas fa-dollar-sign"></i> &nbsp; Asignar Precio</a>
                    @elseif(auth()->user()->hasRole('user'))
                        <a href="{{ url('/orders') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; Volver a la Lista</a>
                        @if($pedido->state_id != 3)
                            <a href="{{ url('/pedidos/'.$pedido->id.'/cancel') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> &nbsp; Cancelar Pedido</a>
                        @endif
                    @elseif(auth()->user()->hasRole('pharmacy'))
                        <a href="{{ url('/pharmacies/orders') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> &nbsp; Volver a la Lista</a>
                        <a href="{{ url('/pedidos/'.$pedido->id.'/deliver') }}" class="btn btn-success"><i class="fas fa-hand-holding"></i> &nbsp; Marcar como Entregado</a>
                        <a href="{{ url('/pedidos/'.$pedido->id.'/cancel') }}" class="btn btn-danger"><i class="fas fa-times-circle"></i> &nbsp; Cancelar Pedido</a>
                        <a href="#total" data-toggle="modal" data-target="#total" class="btn btn-info"><i class="fas fa-dollar-sign"></i> &nbsp; Asignar Precio</a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="prescription" tabindex="-1" aria-labelledby="prescription" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Receta</h5>
                    </div>

                    <div class="modal-body">
                        <img src="{{ $pedido->prescription }}" class="img-fluid" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        @if(!auth()->user()->hasRole('user'))
            <div class="modal fade" id="total" tabindex="-1" aria-labelledby="total" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/pedidos/'.$pedido->id.'/total') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Asignar un total</h5>
                            </div>

                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total:') }}</label>

                                    <div class="col-md-6">
                                        <input id="total" type="number" step="0.01" class="form-control" name="total" autocomplete="total" autofocus>
                                    </div>
                                </div>                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input class="btn btn-primary" type="submit" value="Asignar Total" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
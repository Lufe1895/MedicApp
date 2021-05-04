@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Editar Pedidos</h1>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ url('/pedidos') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <select name="user_id" class="form-control" required autofocus>
                                    @foreach($users as $user)
                                        @if($user->hasRole('user'))
                                            <option value="{{ $user->id }}">{{ $user->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Farmacia') }}</label>

                            <div class="col-md-6">
                                <select name="pharmacy_id" class="form-control" required autofocus>
                                    @foreach($users as $user)
                                        @if($user->hasRole('pharmacy'))
                                            <option value="{{ $user->id }}">{{ $user->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required autocomplete="last_name" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required autocomplete="last_name" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Receta') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="file" class="form-control" name="phone" value="-" disabled autocomplete="last_name" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('Método de pago') }}</label>

                            <div class="col-md-6">
                                <select name="payment" class="form-control" required autofocus>
                                    <option value="Tarjeta">Tarjeta</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select name="state_id" class="form-control" required autofocus>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id  }}">{{ $state->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total') }}</label>

                            <div class="col-md-6">
                                <input id="total" type="number" class="form-control" name="total" autofocus>

                                @error('transliterator_create_from_rules')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary btn-lg" value="Guardar" />
                    </form>
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
@extends('layouts.panel')

@section('content')
    <div class="content">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">Editar Usuarios</h1>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <div class="card-body">
                    <form action="{{ url('/users/'.$user->id)}}" method="post">
                        {{ method('PUT')}}
                        {{ csrf_field()}}

                    </form>
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

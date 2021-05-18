@extends('layouts.panel')

@section('content')
    <div class="content">
        <form action="{{ url('/api/people/login') }}" method="post">
            <input type="text" name="email">
            <input type="text" name="password">
            <input type="submit" value="loguear">
        </form>
    </div>
@endsection
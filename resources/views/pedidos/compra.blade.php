@extends('layouts.panel')

@section('content')
    <buy-component user="{{ auth()->user()->person }}" />
@endsection
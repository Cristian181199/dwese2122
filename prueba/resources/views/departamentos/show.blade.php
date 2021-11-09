@extends('layouts.plantilla')

@section('title', 'Departamento ' . $departamento)

@section('content')
    <h1>Bienvenido al departamento {{$departamento}}</h1>
@endsection
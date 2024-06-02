@extends('layouts.app')

@section('content')
    <h1>Detalles del Equipo</h1>
    <div class="card">
        <div class="card-header">
            Equipo #{{ $equipo->equipo_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Modelo: {{ $equipo->modelo }}</h5>
            <p class="card-text">Tipo de Equipo: {{ $equipo->tipo->nombre }}</p>
            <p class="card-text">Marca: {{ $equipo->marca->nombre }}</p>
            <a href="{{ route('equipos.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

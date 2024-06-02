@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>
    <div class="card">
        <div class="card-header">
            Cliente #{{ $cliente->cliente_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->persona->primer_nombre }} {{ $cliente->persona->primer_apellido }}</h5>
            <p class="card-text">Segundo Nombre: {{ $cliente->persona->segundo_nombre }}</p>
            <p class="card-text">Tercer Nombre: {{ $cliente->persona->tercer_nombre }}</p>
            <p class="card-text">Primer Apellido: {{ $cliente->persona->primer_apellido }}</p>
            <p class="card-text">Segundo Apellido: {{ $cliente->persona->segundo_apellido }}</p>
            <!-- Añade más detalles según sea necesario -->
            <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

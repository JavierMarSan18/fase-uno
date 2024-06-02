@extends('layouts.app')

@section('content')
    <h1>Detalles del Tipo de Equipo</h1>
    <div class="card">
        <div class="card-header">
            Tipo de Equipo #{{ $tipo->tipo_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $tipo->nombre }}</h5>
            <!-- Añade más detalles según sea necesario -->
            <a href="{{ route('tipos.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

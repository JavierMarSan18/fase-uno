@extends('layouts.app')

@section('content')
    <h1>Detalles del Estado</h1>
    <div class="card">
        <div class="card-header">
            Estado #{{ $estado->estado_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $estado->nombre }}</h5>
            <p class="card-text">Orden: {{ $estado->orden }}</p>
            <a href="{{ route('estados.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

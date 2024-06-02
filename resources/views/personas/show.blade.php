@extends('layouts.app')

@section('content')
    <h1>Detalles de la Persona</h1>
    <div class="card">
        <div class="card-header">
            Persona #{{ $persona->persona_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $persona->primer_nombre }} {{ $persona->primer_apellido }}</h5>
            <!-- Añade más detalles según sea necesario -->
            <a href="{{ route('personas.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

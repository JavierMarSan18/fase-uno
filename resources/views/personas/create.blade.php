@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Persona</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('personas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre:</label>
            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
        </div>
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido:</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
        </div>
        <!-- Añade más campos según sea necesario -->
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

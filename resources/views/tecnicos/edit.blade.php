@extends('layouts.app')

@section('content')
    <h1>Editar Técnico</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tecnicos.update', $tecnico->tecnico_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre:</label>
            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="{{ $tecnico->persona->primer_nombre }}" required>
        </div>
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre:</label>
            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="{{ $tecnico->persona->segundo_nombre }}">
        </div>
        <div class="form-group">
            <label for="tercer_nombre">Tercer Nombre:</label>
            <input type="text" class="form-control" id="tercer_nombre" name="tercer_nombre" value="{{ $tecnico->persona->tercer_nombre }}">
        </div>
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido:</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="{{ $tecnico->persona->primer_apellido }}" required>
        </div>
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido:</label>
            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="{{ $tecnico->persona->segundo_apellido }}">
        </div>
        <!-- Añade más campos según sea necesario -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

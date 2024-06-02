@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Servicio</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" id="cliente_id" name="cliente_id" required>
                @foreach($clientes as $cliente)
                <option value="{{ $cliente->cliente_id }}">{{ $cliente->persona->primer_nombre }} {{ $cliente->persona->primer_apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tecnico_id">Técnico:</label>
            <select class="form-control" id="tecnico_id" name="tecnico_id" required>
                @foreach($tecnicos as $tecnico)
                <option value="{{ $tecnico->tecnico_id }}">{{ $tecnico->persona->primer_nombre }} {{ $tecnico->persona->primer_apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="equipo_id">Equipo:</label>
            <select class="form-control" id="equipo_id" name="equipo_id" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->equipo_id }}">{{ $equipo->modelo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="diagnostico">Diagnóstico:</label>
            <input type="text" class="form-control" id="diagnostico" name="diagnostico" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

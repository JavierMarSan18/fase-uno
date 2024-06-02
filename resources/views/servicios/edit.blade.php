@extends('layouts.app')

@section('content')
    <h1>Editar Servicio</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('servicios.update', $servicio->servicio_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select class="form-control" id="cliente_id" name="cliente_id" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->cliente_id }}" {{ $servicio->cliente_id == $cliente->cliente_id ? 'selected' : '' }}>
                        {{ $cliente->persona->primer_nombre }} {{ $cliente->persona->primer_apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tecnico_id">Técnico:</label>
            <select class="form-control" id="tecnico_id" name="tecnico_id" required>
                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->tecnico_id }}" {{ $servicio->tecnico_id == $tecnico->tecnico_id ? 'selected' : '' }}>
                        {{ $tecnico->persona->primer_nombre }} {{ $tecnico->persona->primer_apellido }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="equipo_id">Equipo:</label>
            <select class="form-control" id="equipo_id" name="equipo_id" required>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->equipo_id }}" {{ $servicio->equipo_id == $equipo->equipo_id ? 'selected' : '' }}>
                        {{ $equipo->modelo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="diagnostico">Diagnóstico:</label>
            <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="{{ $servicio->diagnostico }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Lista de Servicios</h1>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary">Crear Nuevo Servicio</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Técnico</th>
                <th>Equipo</th>
                <th>Diagnóstico</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->servicio_id }}</td>
                    <td>{{ $servicio->cliente->persona->primer_nombre }} {{ $servicio->cliente->persona->primer_apellido }}</td>
                    <td>{{ $servicio->tecnico->persona->primer_nombre }} {{ $servicio->tecnico->persona->primer_apellido }}</td>
                    <td>{{ $servicio->equipo->modelo }}</td>
                    <td>{{ $servicio->diagnostico }}</td>
                    <td>{{ $servicio->estado->nombre }}</td>
                    <td>
                        <a href="{{ route('servicios.show', $servicio->servicio_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('servicios.edit', $servicio->servicio_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('servicios.destroy', $servicio->servicio_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

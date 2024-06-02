@extends('layouts.app')

@section('content')
    <h1>Lista de Equipos</h1>
    <a href="{{ route('equipos.create') }}" class="btn btn-primary">Crear Nuevo Equipo</a>
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
                <th>Modelo</th>
                <th>Tipo de Equipo</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->equipo_id }}</td>
                    <td>{{ $equipo->modelo }}</td>
                    <td>{{ $equipo->tipo->nombre }}</td>
                    <td>{{ $equipo->marca->nombre }}</td>
                    <td>
                        <a href="{{ route('equipos.show', $equipo->equipo_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('equipos.edit', $equipo->equipo_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo->equipo_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

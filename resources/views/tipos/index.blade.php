@extends('layouts.app')

@section('content')
    <h1>Lista de Tipos de Equipo</h1>
    <a href="{{ route('tipos.create') }}" class="btn btn-primary">Crear Nuevo Tipo de Equipo</a>
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
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->tipo_id }}</td>
                    <td>{{ $tipo->nombre }}</td>
                    <td>
                        <a href="{{ route('tipos.show', $tipo->tipo_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('tipos.edit', $tipo->tipo_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tipos.destroy', $tipo->tipo_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este tipo de equipo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Lista de Personas</h1>
    <a href="{{ route('personas.create') }}" class="btn btn-primary">Crear Nueva Persona</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Primer Nombre</th>
                <th>Primer Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona->persona_id }}</td>
                    <td>{{ $persona->primer_nombre }}</td>
                    <td>{{ $persona->primer_apellido }}</td>
                    <td>
                        <a href="{{ route('personas.show', $persona->persona_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('personas.destroy', $persona->persona_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta persona?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Lista de Técnicos</h1>
    <a href="{{ route('tecnicos.create') }}" class="btn btn-primary">Crear Nuevo Técnico</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Persona</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->tecnico_id }}</td>
                    <td>{{ $tecnico->persona->primer_nombre }} {{ $tecnico->persona->primer_apellido }}</td>
                    <td>
                        <a href="{{ route('tecnicos.show', $tecnico->tecnico_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('tecnicos.edit', $tecnico->tecnico_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tecnicos.destroy', $tecnico->tecnico_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este técnico?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

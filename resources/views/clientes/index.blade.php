@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Crear Nuevo Cliente</a>
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
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->cliente_id }}</td>
                    <td>{{ $cliente->persona->primer_nombre }} {{ $cliente->persona->primer_apellido }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->cliente_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->cliente_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->cliente_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

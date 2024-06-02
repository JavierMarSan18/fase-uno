@extends('layouts.app')

@section('content')
    <h1>Lista de Estados</h1>
    <a href="{{ route('estados.create') }}" class="btn btn-primary">Crear Nuevo Estado</a>
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
                <th>Orden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
                <tr>
                    <td>{{ $estado->estado_id }}</td>
                    <td>{{ $estado->nombre }}</td>
                    <td>{{ $estado->orden }}</td>
                    <td>
                        <a href="{{ route('estados.show', $estado->estado_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('estados.edit', $estado->estado_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('estados.destroy', $estado->estado_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este estado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

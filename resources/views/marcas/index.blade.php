@extends('layouts.app')

@section('content')
    <h1>Lista de Marcas</h1>
    <a href="{{ route('marcas.create') }}" class="btn btn-primary">Crear Nueva Marca</a>
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
            @foreach($marcas as $marca)
                <tr>
                    <td>{{ $marca->marca_id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td>
                        <a href="{{ route('marcas.show', $marca->marca_id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('marcas.edit', $marca->marca_id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('marcas.destroy', $marca->marca_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta marca?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

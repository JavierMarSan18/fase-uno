@extends('layouts.app')

@section('content')
    <h1>Editar Equipo</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('equipos.update', $equipo->equipo_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $equipo->modelo }}" required>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo de Equipo:</label>
            <select class="form-control" id="tipo_id" name="tipo_id" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->tipo_id }}" {{ $equipo->tipo_id == $tipo->tipo_id ? 'selected' : '' }}>
                        {{ $tipo->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="marca_id">Marca:</label>
            <select class="form-control" id="marca_id" name="marca_id" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->marca_id }}" {{ $equipo->marca_id == $marca->marca_id ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Equipo</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo de Equipo:</label>
            <select class="form-control" id="tipo_id" name="tipo_id" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->tipo_id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="marca_id">Marca:</label>
            <select class="form-control" id="marca_id" name="marca_id" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->marca_id }}">{{ $marca->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Editar Estado</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('estados.update', $estado->estado_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $estado->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="orden">Orden:</label>
            <input type="number" class="form-control" id="orden" name="orden" value="{{ $estado->orden }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection

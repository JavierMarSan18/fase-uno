@extends('layouts.app')

@section('content')
    <h1>Detalles del Servicio</h1>
    <div class="card">
        <div class="card-header">
            Servicio #{{ $servicio->servicio_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Cliente: {{ $servicio->cliente->persona->primer_nombre }} {{ $servicio->cliente->persona->primer_apellido }}</h5>
            <p class="card-text">Técnico: {{ $servicio->tecnico->persona->primer_nombre }} {{ $servicio->tecnico->persona->primer_apellido }}</p>
            <p class="card-text">Equipo: {{ $servicio->equipo->modelo }}</p>
            <p class="card-text">Diagnóstico: {{ $servicio->diagnostico }}</p>
            <p class="card-text">Estado: {{ $servicio->estado->nombre }}</p>
            <p class="card-text">Fecha de Inicio: {{ $servicio->fecha_inicio }}</p>
            <p class="card-text">Fecha de Finalización: {{ $servicio->fecha_fin }}</p>

            <h3>Detalles del Servicio</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Referencia</th>
                        <th>Estado</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->orden }}</td>
                            <td>{{ $detalle->observaciones }}</td>
                            <td>{{ $detalle->estado->nombre }}</td>
                            <td>{{ $detalle->fecha_inicio }}</td>
                            <td>{{ $detalle->fecha_fin }}</td>
                            <td>

                                @if(!$detalle->fecha_inicio && !$detalle->fecha_fin)
                                    <form action="{{ route('servicios.startDetalle', $detalle->detalle_servicio_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Comenzar</button>
                                    </form>
                                @elseif($detalle->fecha_inicio && !$detalle->fecha_fin)
                                    <form action="{{ route('servicios.endDetalle', $detalle->detalle_servicio_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Finalizar</button>
                                    </form>
                                @else
                                    Completado
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('servicios.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
@endsection

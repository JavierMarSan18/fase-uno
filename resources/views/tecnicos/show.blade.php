@extends('layouts.app')

@section('content')
    <h1>Detalles del Técnico</h1>
    <div class="card">
        <div class="card-header">
            Técnico #{{ $tecnico->tecnico_id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $tecnico->persona->primer_nombre }} {{ $tecnico->persona->primer_apellido }}</h5

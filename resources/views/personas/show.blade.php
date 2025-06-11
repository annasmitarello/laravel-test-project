@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Persona</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
            <p><strong>Apellido:</strong> {{ $persona->apellido }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $persona->fecha_nacimiento }}</p>
        </div>
    </div>

    <a href="{{ route('personas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

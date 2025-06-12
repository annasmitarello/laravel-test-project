@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detalle de Persona</h2>

    <div class="mb-4">
        <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
        <p><strong>Apellido:</strong> {{ $persona->apellido }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') }}</p>
    </div>

    <div>
        <h3 class="text-xl font-semibold mb-2 text-gray-700">Tags asociados</h3>
        @if($persona->tags->isNotEmpty())
            <ul class="list-disc list-inside text-gray-700">
                @foreach($persona->tags as $tag)
                    <li>{{ $tag->nombre }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Esta persona no tiene tags asociados.</p>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('personas.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>
</div>
@endsection

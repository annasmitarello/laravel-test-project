@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Detalles del Auto</h2>

    <div class="bg-white shadow p-6 rounded space-y-4">
        <p><strong>Patente:</strong> {{ $auto->patente }}</p>
        <p><strong>Color:</strong> {{ $auto->color }}</p>
        <p><strong>Modelo:</strong> {{ $auto->modelo }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route('autos.edit', $auto) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        <a href="{{ route('autos.index') }}" class="text-gray-600 hover:underline ml-4">Volver al listado</a>
    </div>
</div>
@endsection

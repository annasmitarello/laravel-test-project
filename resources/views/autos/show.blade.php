@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Detalle de Auto</h2>

    <div class="mb-4">
        <p><strong>Patente:</strong> {{ $auto->patente }}</p>
        <p><strong>Color:</strong> {{ $auto->color }}</p>
        <p><strong>Modelo:</strong> {{ $auto->modelo }}</p>
    </div>

    <div>
        <h3 class="text-xl font-semibold mb-2 text-gray-700">Tags asociados</h3>
        @if($auto->tags->isNotEmpty())
            <ul class="list-disc list-inside text-gray-700">
                @foreach($auto->tags as $tag)
                    <li>{{ $tag->nombre }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Este auto no tiene tags asociados.</p>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('autos.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>
</div>
@endsection

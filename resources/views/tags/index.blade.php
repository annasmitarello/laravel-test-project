@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Listado de Tags</h2>
        <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Nuevo Tag</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <ul class="bg-white shadow-md rounded divide-y">
        @foreach($tags as $tag)
            <li class="p-4 flex justify-between">
                <span>{{ $tag->nombre }}</span>
                <div class="space-x-2">
                    <a href="{{ route('tags.edit', $tag) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline"
                          onsubmit="return confirm('¿Eliminar este tag?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
